<div class="modal fade" id="document" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Document to Session</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body attachFile-modal-body">
               
                @forelse ($documents as $document)
                
                
                <x-box.item  
                :title="$document->title"
                :color="$document->color">
                @slot('add')
                {{ route('addDocumentToSession' , [
                    'session' => $session,
                    'active_id' => $document->id
                ]) }}   
                @endslot

                @livewire('box.modal.document.show-docs-activity', ['documentId' =>  $document->id])
                </x-container.File>
                
                @empty
                    
                @endforelse
            

            {{ $documents->links() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger close-btn" data-target="#docs" data-toggle="modal">Add</button>
                <button type="button" class="btn btn-secondary close-btn" aria-label="Close" onclick="customCloseDocModal()">Close</button>
                
            </div>
        </div>
    </div>
</div>
<script>
    function submitDocsForm() {
    $.ajax({
       type: 'POST',
       url: $('#DocsForm').attr('action'),
       data: $('#DocsForm').serialize(),
       success: function (data) {
          localStorage.setItem('showDocsModal', 'true');
          location.reload();
       },
       error: function (error) {
          console.error(error);
       }
    });
 }

 $(document).ready(function() {
    var showFilesModal = localStorage.getItem('showDocsModal');
    if (showFilesModal === 'true') {
       localStorage.removeItem('showDocsModal');
       $('#document').modal('show');
    }
 });
</script>
