<div>
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        {{ __("Files")}} 
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <a data-toggle="modal" data-target="#file" class="btn btn-danger btn-sm" >Attach</a>
                        
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-question-circle fa-2x text-danger"></i>
                </div>
            </div>
        </div>
    </div>
</div>

@include('livewire.box.modal.file.attachFile-activity')
@include('livewire.box.modal.file.addFile-activity')
