<?php

namespace App\Http\Livewire\Factory\Question\ShortAnswerQuestion;

use App\Http\Livewire\Factory\Question\QuestionComponents;
use App\Models\Term;
class Create extends QuestionComponents
{

    public function mount(): void
    {
        $this->answers = [''];
        if (!empty($this->question)) {
            $this->setValueWithQuestion();
        }
    }

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        $terms = Term::all(); 
        return view('livewire.factory.question.short-answer-question.create', compact('terms'));
    }
}