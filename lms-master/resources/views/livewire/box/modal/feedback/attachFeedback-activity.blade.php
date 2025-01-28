
<div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="feedback">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add feedback to session </h5>
                <button type="button" class="close" aria-label="Close" onclick="customCloseFeedbackModal()">
                    <span aria-hidden="true">&times;</span>
               </button>
            </div>
           <div class="modal-body">
               
                @forelse ($feedbacks as $feedback)
                
                    <x-box.item  
                    :title="$feedback->title"
                    :color="$feedback->color">
                    @slot('add')
                    {{ route('addFeedbackToSession' , [
                        'session' => $session,
                        'active_id' => $feedback->id
                    ]) }}   
                    @endslot
                    @livewire('box.modal.feedback.show-feedback-activity', ['feedbackId' =>  $feedback->id])
                    </x-container.File>
                
                @empty                    
                @endforelse
        
            {{ $feedbacks->links() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success close-btn" data-target="#addfeedback" data-toggle="modal">Add</button>
                <button type="button" class="btn btn-secondary close-btn" aria-label="Close" onclick="customCloseFeedbackModal()">Close</button>
            </div>
        </div>
    </div>
</div>