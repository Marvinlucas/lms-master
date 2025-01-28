<div class="modal fade" id="createSessionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Session: {{ $term->title ?? '' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create Form Card -->
                <div class="col-12">


                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="text-center">
                            <form class="user" method="POST" action="{{ route('sessionModal.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="title" type="text" class="form-control form-control-user"
                                            id="title" placeholder="Title" required>
                                        @error('title')
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

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <!-- Add a button to submit the form or perform the desired action -->
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
