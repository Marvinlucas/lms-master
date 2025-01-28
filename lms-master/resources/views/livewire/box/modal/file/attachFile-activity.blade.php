<div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="file">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add File to Session</h5>
                <button type="button" class="close" aria-label="Close" onclick="customCloseFileModal()">
                     <span aria-hidden="true">&times;</span>
                </button> 
            </div>
           <div class="modal-body attachFile-modal-body">
               
                @forelse ($files as $file)
                <x-box.item  
                :title="$file->title"
                :color="$file->color">
                @slot('add')
                {{ route('addFileToSession' , [
                    'session' => $session,
                    'active_id' => $file->id
                ]) }}   
                @endslot

                </x-container.File>
                
                @empty 
                @endforelse
            

            {{ $files->links() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger close-btn" data-target="#files" data-toggle="modal">Add</button>
                <button type="button" class="btn btn-secondary close-btn" aria-label="Close" onclick="customCloseFileModal()">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
function submitFileForm() {
    $.ajax({
        type: 'POST',
        url: $('#fileForm').attr('action'),
        data: $('#fileForm').serialize(),
        success: function (data) {
            localStorage.setItem('showFilesModal', 'true');
            location.reload();
        },
        error: function (error) {
            console.error(error);
        }
    });
}

$(document).ready(function() {
    var showFilesModal = localStorage.getItem('showFilesModal');
    if (showFilesModal === 'true') {
        localStorage.removeItem('showFilesModal');
        $('#file').modal('show');
    }
});
</script>