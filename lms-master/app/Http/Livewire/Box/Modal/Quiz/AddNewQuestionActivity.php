<?php

namespace App\Http\Livewire\Box\Modal\Quiz;

use App\Models\Quiz;
use Livewire\Component;
use Illuminate\Http\Request;

class AddNewQuestionActivity extends Component
{

    public $quiz_id;
    public $quiz;

    public function mount($quiz_id)
    {
        $this->quiz_id = $quiz_id;
        $this->quiz = Quiz::find($quiz_id);
    }

    public function render(Request $request)
    {
        $quiz = $request->quiz_id ? Quiz::findOrFail($request->quiz_id) : null;
        return view('livewire.box.modal.quiz.add-new-question-activity', compact('quiz'));
      
    }
}
