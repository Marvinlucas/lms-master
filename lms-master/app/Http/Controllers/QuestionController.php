<?php

// app/Http/Controllers/QuestionController.php

namespace App\Http\Controllers;
use DB;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Term;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $this->authorize('question.index');
        $questions = Question::with(['questionType', 'term']) 
                             ->orderBy('created_at', 'desc')
                             ->paginate();
        return view("contents.admin.question.index", compact("questions"));
    }
    public function create(Request $request)
    {
        $this->authorize('question.create');
        $quiz = $request->quiz_id ? Quiz::findOrFail($request->quiz_id) : null;
        return view('contents.admin.question.form', compact('quiz'));
    }
    
    public function edit(Question $question)
    {
        $this->authorize('question.edit');
        return view('contents.admin.question.form', compact('question'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'questionTypeId' => 'required',
           // 'term_id' => 'nullable',
        ]);
    
        $question = new Question();
        $question->type = $request->input('questionTypeId'); 
      //  $question->term_id = $request->input('term_id');
      
        $question->save();
    
        return redirect()
            ->route('question.index')
            ->with('success', 'Question created successfully');
    }
    
    public function destroy(Question $question)
    {
        $this->authorize('question.delete');
    
        // I added these lines to disable the foreign key, it checks before deleting the question
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $question->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    
        return redirect()
            ->route("question.index")
            ->with('danger', __('question deleted successfully'));
    }
}    