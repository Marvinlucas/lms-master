<button type="button" class="green-button" data-target="#question_{{ $quiz->id }}"
    data-toggle="modal">Questions</button>

<div class="modal fade" id="question_{{ $quiz->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog custom-modal" role="file">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Question</h5>
                <button type="button" class="close" aria-label="Close"
                    onclick="customCloseAddQuestionsModal('{{ $quiz->id }}')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body addQuestion-modal-body">


                <div class="row">

                    <div class="col-lg-6">
                        <div class="card shadow mb-4 border-bottom-success card-body-question">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-uppercase">{{ $quiz->title }}</h6>

                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <p>
                                    {!! $quiz->description !!}
                                </p>
                                <div class="text-center">

                                    <hr />

                                    @forelse ($quiz->Questions as $question)
                                        <x-box.item :title="$question->title">
                                            @if (!$loop->first)
                                                @slot('up')
                                                    {{ route('orderModalChangeQuestion', ['from' => $question->pivot->id, 'move' => 'up']) }}
                                                @endslot
                                            @endif
                                            @if (!$loop->last)
                                                @slot('down')
                                                    {{ route('orderModalChangeQuestion', ['from' => $question->pivot->id, 'move' => 'down']) }}
                                                @endslot
                                            @endif

                                            @slot('delete')
                                                {{ route('deleteModalQuestionAsQuiz', ['quizQuestion' => $question->pivot->id]) }}
                                            @endslot

                                        </x-box.item>

                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 ">
                        <div class="card shadow mb-4 border-bottom-success card-body-question">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between"
                                style="height: 74px;">
                                <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Questions') }}</h6>
                                @livewire('box.modal.quiz.add-new-question-activity', ['quiz_id' => $quiz->id])
                            </div>
                            <!-- Card Body -->
                            <div class="card-body ">
                                <div class="text-center">
                                    @livewire('container.show-questions', [
                                        'route' => 'ModalQuestion',
                                        'parent' => $quiz->id,
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" aria-label="Close"
                        onclick="customCloseAddQuestionsModal('{{ $quiz->id }}')">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>
@if(session('showModal'))
    <script>
        $(document).ready(function () {
            // Show the modal based on the quiz ID
            $('#question_{{ $quiz->id }}').modal('show');
        });
    </script>
    
@endif
