<?php

namespace App\Http\Livewire\Factory\Question\EssayQuestion;

use App\Http\Livewire\Factory\Question\QuestionComponents;
use App\Models\Term;

class Create extends QuestionComponents
{

    public function mount(): void
    {
        $this->answers = [
            'min' => 0,
            'max' => 500,
        ];
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
        $terms = Term::all(); // Fetch all terms from the database
        return view('livewire.factory.question.essay-question.create', compact('terms'));
    }
}