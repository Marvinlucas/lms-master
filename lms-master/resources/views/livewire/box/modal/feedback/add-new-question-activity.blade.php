<div class="dropdown no-arrow">
    <a class="dropdown-item" href="#" id="createSessionButton" data-toggle="modal"
        data-target="#createNewQuestions_{{ $feedback->id }}">
        <span class="badge badge-success">
            <i class="fas fa-plus pr-2 text-white"></i>
        </span>
        {{ __('New') }}
    </a>
</div>


<div class="modal fade" id="createNewQuestions_{{ $feedback->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog custom-modals" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Question: {{-- $term->title ?? '' --}}</h5>
                <button type="button" class="close"  aria-label="Close"  onclick="customCloseAddNewQuestionsModal('{{ $feedback->id }}')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="min-height: 550px;">
                <!-- Create Form Card -->
                <div class="col-12">
                    <div class="card shadow mb-4 border-bottom-success">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                            {{--<h6 class="m-0 font-weight-bold">{{ __("Create New questions") }}</h6>--}}
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="text-center">
                                
                                @livewire('factory.render', [
                                    'question' => $question ?? null,
                                    'quiz' => $quiz ?? null
                                    ])
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" aria-label="Close"
                        onclick="customCloseAddNewQuestionsModal('{{ $feedback->id }}')">Close</button>
                </div>
        </div>
    </div>
</div>

