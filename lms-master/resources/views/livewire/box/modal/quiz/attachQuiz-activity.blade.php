
<div class="modal fade" id="quiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="quiz">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add quiz to session </h5>
                <button type="button" class="close" aria-label="Close" onclick="customCloseQuizModal()">
                    <span aria-hidden="true">&times;</span>
               </button>
            </div>
           <div class="modal-body attachFile-modal-body">
               
                @forelse ($quizes as $quiz)
                
                    <x-box.item  
                    :title="$quiz->title"
                    :color="$quiz->color">
                    @slot('add')
                    {{ route('addQuizToSession' , [
                        'session' => $session,
                        'active_id' => $quiz->id
                    ]) }}   
                    @endslot
                    @livewire('box.modal.quiz.add-question-activity', ['quizId' => $quiz->id])
            
                    </x-container.File>
                    
                @empty                    
                @endforelse
        
            {{ $quizes->links() }}
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-warning close-btn" data-target="#quizes" data-toggle="modal">Add</button>
                <button type="button" class="btn btn-secondary close-btn" aria-label="Close" onclick="customCloseQuizModal()">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    function submitquizForm() {
    $.ajax({
       type: 'POST',
       url: $('#quizForm').attr('action'),
       data: $('#quizForm').serialize(),
       success: function (data) {
          localStorage.setItem('showQuizModal', 'true');
          location.reload();
       },
       error: function (error) {
          console.error(error);
       }
    });
 }

 $(document).ready(function() {
    var showFilesModal = localStorage.getItem('showQuizModal');
    if (showFilesModal === 'true') {
       localStorage.removeItem('showQuizModal');
       $('#quiz').modal('show');
    }
 });
</script>