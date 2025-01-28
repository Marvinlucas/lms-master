
<div class="modal fade" id="addfeedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="feedback">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add feedback</h5>
                <button type="button" class="close" aria-label="Close" onclick="customCloseAddFeedbackModal()">
                    <span aria-hidden="true">&times;</span>
               </button>          
            </div>
           <div class="modal-body">
               
            <div class="col-12">
                
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold">{{ __("Create New Feedback") }}</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="text-center">
            
                        
                                <form class="user" id="FeedbackForm" method="POST" action="{{ route('feedback.store') }}">
                        
                            
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="title" type="text" class="form-control form-control-user" id="title"
                                            placeholder="Title" value="{{ $feedback->title ?? '' }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror    
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select name="require" class="form-control">
                                            <option value="1">True</option>
                                            <option value="0">False</option>
                                        </select>
                                       
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <textarea name="description" type="text" class="form-control editor" id="description"
                                        placeholder="Description">{{ $feedback->description ?? '' }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" onclick="submitFeedbackForm()" class="btn btn-primary">{{ __('Save') }}</button>
                                    <button type="button" class="btn btn-secondary close-btn" aria-label="Close" onclick="customCloseAddFeedbackModal()">Close</button>
                                </div>
                           
                               
                            </form>
            
            
                        </div>
                    </div>
                </div>
            
                
                  


            </div>
            
        </div>
    </div>
</div>