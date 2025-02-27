@if($title)
<div class="col-12 mt-4 mb-2">

    <div class="card shadow mb-4 border-bottom-success">
        <div class="card-header-custom py-3">
            <h6 class="m-0 font-weight-bold">{{ $title }}</h6>
        </div>
        <div class="card-body">
            
            <h6>{{ $question_body }}</h6>
            @if(isset($workout) && $workout->WorkOutQuiz->where('question_id', $question->id)->first()->answer != '')
            <p>{{ $workout->WorkOutQuiz->where('question_id', $question->id)->first()->answer }}</p>     
            @endif

        </div>
    </div>

</div>
@endif