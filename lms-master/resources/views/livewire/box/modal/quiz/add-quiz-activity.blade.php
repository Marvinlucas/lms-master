<div class="modal fade" id="quizes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal" role="file">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Quiz</h5>
                <button type="button" class="close" aria-label="Close" onclick="customCloseAddQuizModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body addFile-modal-body">


                <form class="user" id="quizForm" method="POST" action="{{ route('quizModal.store') }}">

                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="title" type="text" class="form-control form-control-user" id="title"
                                placeholder="Title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="min_pass_score" type="number" class="form-control form-control-user"
                                id="min_pass_score" placeholder="Passing Score(%)">
                            @error('min_pass_score')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select name="show_question" class="form-control" id="show_question">
                                @foreach ($show_question as $question)
                                    <option value="{{ $question }}"
                                        {{ isset($quiz->show_question) && $quiz->show_question == $question ? 'selected' : '' }}>
                                        {{ $question }} </option>
                                @endforeach
                            </select>

                            @error('show_question')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="term_id" type="hidden" value="{{ $term->id }}">
                            <input name="term_title" type="text" class="form-control form-control-user"
                                id="term_title" value="{{ $term->title }}" placeholder="Assign Lesson"
                                disabled>
                            @error('term_id')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
<<<<<<< HEAD
                        <textarea name="description" type="text" class="form-control editor" id="description" placeholder="Description"></textarea>
=======
                        <textarea name="description" type="text" class="form-control mt-3" id="description" placeholder="Description"></textarea>
>>>>>>> main

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="submitquizForm()" class="btn btn-primary">{{ __('Save') }}</button>
                <button type="button" class="btn btn-secondary close-btn" aria-label="Close"
                    onclick="customCloseAddQuizModal()">Close</button>
            </div>
            </form>

        </div>
    </div>
</div>
