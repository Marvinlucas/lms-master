<?php

namespace App\Http\Livewire\Box;

use App\Models\Quiz;
use App\Models\Term;
use App\Traits\Sequence;
use Livewire\Component;
use Livewire\WithPagination;

class QuizActivity extends Component
{
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';
    use Sequence;

    protected array $show_question = [
        'StepByStep', 'OnePage'
    ];
    public $session;
    public $termId;
    public function mount($termId)
    {
        $this->termId = $termId;
    }
   
    /**
     * render
     * @param  Quiz $quiz
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render(Quiz $quiz)
    {
        $quizes = Quiz::where('term_id', $this->termId)->paginate(); // Filter quizzes by term_id
        $show_question = $this->show_question;
        
        // Fetch the term with the specified term_id
        $term = Term::find($this->termId);
    
        // Pass the term to the view
        return view('livewire.box.quiz-activity', compact('quizes', 'show_question', 'term','quiz'));
    }
    
}
