<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\Term;
use App\Traits\Sequence;


class ModalQuizController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  QuizRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(QuizRequest $request)
    {
        $this->authorize('quiz.create');
        Quiz::create($request->all());
        return redirect()
            ->route("quiz.index")
            ->with('success', __('quiz created successfully'));
    }
}
