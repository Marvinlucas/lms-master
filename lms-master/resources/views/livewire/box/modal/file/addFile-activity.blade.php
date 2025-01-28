<div class="modal fade" id="files" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal" role="file">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add File</h5>
                <button type="button" class="close" aria-label="Close" onclick="customCloseFilesModal()">
                     <span aria-hidden="true">&times;</span>
                </button>           
            </div>

           <div class="modal-body addFile-modal-body">

            <form class="user" id="fileForm" method="POST" action="{{ route('fileModal.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="form-group">
                            <label class="left-label" for="title">{{ __('Title') }}</label>
                            <input name="title" type="text" class="form-control form-control-user" id="title" placeholder="title">
                        </div>

                        <div class="form-group">
<<<<<<< HEAD
                            <label class="left-label" for="description">{{ __('Description') }}</label>
                            <input name="description" type="text" class="form-control form-control-user" id="description" placeholder="description" >
=======
                            <textarea name="description" type="text" class="form-control mt-3" id="description"
                                placeholder="Description">{{ $file->description ?? '' }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
>>>>>>> main
                        </div>


                    </div>
                    <div class="col-sm-6 left-label">
                        <label class="left-label">{{ __('File') }}</label>
                        @livewire('services.media.uploadable',[
                        'file' => $file->file ?? '',
                        'path' => 'files',
                        'target' => 'files'
                        ])
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="submitFileForm()" class="btn btn-primary">{{ __('Save') }}</button>
                <button type="button" class="btn btn-secondary close-btn" aria-label="Close" onclick="customCloseFilesModal()">Close</button>
            </div>
        </form>

        </div>
    </div>
</div>






