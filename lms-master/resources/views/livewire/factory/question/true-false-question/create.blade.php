<div class="col-12 text-left mt-4 p-4">
    <div class="card shadow border-bottom-success">
        <div class="card-header-custom py-3">
            <h6 class="m-0 font-weight-bold">True or False</h6>
        </div>
        <div class="card-body p-5">
            {{--<div class="form-group">
                <label for="term">Assign Lesson</label>
                <select name="term_id" id="term_id" class="form-control" wire:model="termId">
                    <option value="">All Terms</option>
                    @foreach ($terms as $term)
                    <option value="{{ $term->id }}">{{ $term->title }}</option>
                    @endforeach
                </select>
            </div>--}}
            <input type="hidden" wire:model="questionTypeId" />
            <div class="form-group">
                <label for="titleofquestion">Title of question</label>
                <input type="text" class="form-control" id="titleofquestion" wire:model="title">
            </div>
            <div class="form-group">
                <label for="descriptionofquestion">Description of Question</label>
                <textarea class="form-control" id="descriptionofquestion" wire:model="question_body"></textarea>
            </div>
            @forelse($answers as $index => $answer)
            <div class="form-group">
            <label for="answer{{ $index }}">Answer {{ $loop->iteration }}</label>
                <div class="row">
                    <div class="col-12">
                        <input name="correctAnswer" value="{{ $index }}" wire:model="correctAnswer" class="form-check-input" type="radio">
                        <input type="text" class="form-control" id="answer{{ $index }}" wire:model="answers.{{ $index }}">
                    </div>
                
                </div>
            </div>
            @empty 
            @endforelse
            
            </form>

        </div>
        <div class="card-footer p-3">
            <button wire:click.prevent="store" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Save</span>
            </button>
        </div>
    </div>
    <form>
    


    {{--@include('livewire.factory.question.true-false-question.review')--}}
</div>