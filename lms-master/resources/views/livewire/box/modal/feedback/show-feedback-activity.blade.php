<button type="button" class="green-button" data-target="#feedback_{{ $feedback->id }}" data-toggle="modal">Show
    Question</button>

<div class="modal fade" id="feedback_{{ $feedback->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog custom-modal" role="file">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Document</h5>
                <button type="button" class="close" aria-label="Close"
                    onclick="customCloseShowFeedbackModal('{{ $feedback->id }}')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body addQuestion-modal-body">

                <div class="row">
                    <div class="col-6">
                        <div class="card shadow mb-4 border-bottom-success">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold">{{ $feedback->title }}</h6>
                                <div class="dropdown no-arrow">
                                    <div class="dropdown no-arrow">
                                        <x-BackButton />
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <p>
                                    {!! $feedback->description !!}
                                </p>
                                <div class="text-center">
                                    
                                    <hr/>
                
                                    @forelse ($feedback->Questions as $question)
                                    
                                    <x-box.item
                                    :title="$question->title">
                                    @if(!$loop->first)
                                        @slot('up')
                                            {{ route('orderChangeQuestionFeedback' , ['from' => $question->pivot->id , 'move' => 'up' ]) }}
                                        @endslot
                                    @endif
                                    @if(!$loop->last)
                                        @slot('down')
                                            {{ route('orderChangeQuestionFeedback' , ['from' => $question->pivot->id , 'move' => 'down' ]) }}
                                        @endslot
                                    @endif
                                
                                    @slot('delete')
                                        {{ route('deleteQuestionAsFeedback' ,['feedbackQuestion' => $question->pivot->id ]) }}
                                    @endslot
                                
                                    </x-box.item>
                                    
                                    @empty  
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-6">
                        <div class="card shadow mb-4 border-bottom-success">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold">{{ __("Questions") }}</h6>
                                @livewire('box.modal.feedback.add-new-question-activity', ['feedback_id' => $feedback->id])
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="text-center">
                                    @livewire('container.show-questions', [
                                        'route' => 'addQuestionToFeedback',
                                        'parent' => $feedback->id
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" aria-label="Close"
                    onclick="customCloseShowFeedbackModal('{{ $feedback->id }}')">Close</button>
            </div>


        </div>
    </div>
</div>


@if (session('showModal1') && session('showModal1') == $feedback->id)
    <script>
        $(document).ready(function() {
            // Show the modal based on the quiz ID
            $('#feedback_{{ $feedback->id }}').modal('show');
        });
    </script>
@endif
