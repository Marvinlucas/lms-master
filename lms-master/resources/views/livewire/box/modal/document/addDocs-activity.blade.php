<div class="modal fade" id="docs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal" role="file">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Document</h5>
                <button type="button" class="close" aria-label="Close" onclick="customCloseAddDocsModal()">
                     <span aria-hidden="true">&times;</span>
                </button>           
            </div>

           <div class="modal-body addDocs-modal-body">

               <form class="user" id="DocsForm" method="POST" action="{{ route('document.store') }}">
           
               @csrf
               <div class="form-group row">
                   <div class="col-sm-6 mb-3 mb-sm-0">
                       <input name="title" type="text" class="form-control form-control-user" id="title"
                           placeholder="Title" value="{{ $document->title ?? '' }}">
                       @error('title')
                           <span class="invalid-feedback" role="alert">
                               {{ $message }}
                           </span>
                       @enderror    
                   </div>
               </div>
               <div class="form-group">
<<<<<<< HEAD
                   <textarea name="description" type="text" class="form-control editor" id="description"
=======
                   <textarea name="description" type="text" class="form-control mt-3" id="description"
>>>>>>> main
                       placeholder="Description">{{ $document->description ?? '' }}</textarea>
                   @error('description')
                       <span class="invalid-feedback" role="alert">
                           {{ $message }}
                       </span>
                   @enderror
               </div>

            <div class="modal-footer">
                <button type="button" onclick="submitDocsForm()" class="btn btn-primary">{{ __('Save') }}</button>
                <button type="button" class="btn btn-secondary close-btn" aria-label="Close" onclick="customCloseAddDocsModal()">Close</button>
            </div>
        </form>

        </div>
    </div>
</div>






