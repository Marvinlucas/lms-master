<div id="question-{{ $question->id }}" class="question col-12 text-left mt-4 p-4">

    <div class="card shadow mb-4 border-bottom-success">
        <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
 
            <h6 class="m-0 font-weight-bold">{{ $question->title }}</h6>
        </div>
        <div class="card-body">
            <form class="workout_questions" id="question-{{ $question->id }}" method="post" action="{{ route("quizWorkout") }}">
                @csrf
                    
                    <input type="hidden" value="{{ $question->id }}" name="question_id">
                    <input type="hidden" value="{{ $workout->id }}" name="workout_id">
                <p>
                    {{ $question->question_body }}
                </p>
                
                <textarea name="answer-{{ $question->id }}" rows="10" type="text" class="form-control"></textarea>
                {{--<input type="submit" value="{{ __('save') }}" class="btn btn-primary mt-3" />--}}
            </form>
        </div>
   
    </div>

</div>