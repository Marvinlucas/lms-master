<div>
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        {{ __("Document")}} 
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <a data-toggle="modal" data-target="#document" class="btn btn-primary btn-sm" style="background-color: #36b9cc;" >Attach</a>
                        
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-question-circle fa-2x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@include('livewire.box.modal.document.attachDocs-activity')
@include('livewire.box.modal.document.addDocs-activity')

