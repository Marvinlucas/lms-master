<?php

namespace App\Http\Livewire\Box\Modal\Feedback;


use App\Models\Quiz;
use Livewire\Component;
use Illuminate\Http\Request;
class AddNewQuestionActivity extends Component
{
    public $feedback;
    public $feedback_id;
    public function mount($feedback_id)
    {
        $this->feedback_id = $feedback_id;
        $this->feedback = Quiz::find($feedback_id);
    }

    public function render(Request $request)
    {
        $feedback = $request->feedback_id ? Quiz::findOrFail($request->feedback_id) : null;
        return view('livewire.box.modal.feedback.add-new-question-activity', compact('feedback'));
      
    }
}
