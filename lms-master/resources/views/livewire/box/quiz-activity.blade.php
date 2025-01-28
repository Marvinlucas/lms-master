<div>
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        {{ __("Quizes")}} 
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <a data-toggle="modal" data-target="#quiz" class="btn btn-warning btn-sm" >Attach</a>
                        
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-question-circle fa-2x text-warning"></i>
                </div>
            </div>
        </div>
    </div>
</div>

@include('livewire.box.modal.quiz.attachQuiz-activity')
@include('livewire.box.modal.quiz.add-quiz-activity')
{{--@include('livewire.box.modal.quiz.add-question-activity')--}}
