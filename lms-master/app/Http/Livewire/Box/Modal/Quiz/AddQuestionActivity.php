<?php

namespace App\Http\Livewire\Box\Modal\Quiz;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\Term;
use Livewire\Component;

class AddQuestionActivity extends Component
{
    public $quiz;
    public $quizId;

    public function mount($quizId)
    {
        $this->quizId = $quizId;
        $this->quiz = Quiz::find($quizId);
    }

    public function render()
    {
        $terms = Term::all();
        return view('livewire.box.modal.quiz.add-question-activity', ['quiz' => $this->quiz, 'terms' => $terms]);
    }
    public function orderChangeQuestion(QuizQuestion $from, $move)
    {

        $this->authorize('quiz.update');
        $move_parameters = [
            'up' => ['char' => '<', 'order' => 'desc'],
            'down' => ['char' => '>', 'order' => 'asc']
        ];


        $to = QuizQuestion::where('quiz_id', $from->quiz_id)
            ->where('order', (string)$move_parameters[$move]['char'], $from->order)
            ->orderby('order', (string)$move_parameters[$move]['order'])
            ->first();

        $this->changeOrder($from, $to);

        return redirect()->back();
    }
    
}


