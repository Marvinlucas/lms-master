<?php

namespace App\Http\Livewire\Box\Modal\Feedback;

use App\Models\Feedback;
use Livewire\Component;

class ShowFeedbackActivity extends Component
{

    public $feedback;
    public $feedbackId;
    public function mount($feedbackId)
    {
        $this->feedbackId = $feedbackId;
        $this->feedback = Feedback::find($feedbackId);
    }

    public function render(Feedback $feedback)
    {
        return view('livewire.box.modal.feedback.show-feedback-activity', compact(
            "feedback"
        ));
    }
}
