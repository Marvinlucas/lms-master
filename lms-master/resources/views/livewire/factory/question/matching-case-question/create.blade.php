<div class="col-12 text-left mt-4 p-4">

    <div class="card shadow mb-4 border-bottom-success">
        <div class="card-header-custom py-3">
            <h6 class="m-0 font-weight-bold">Matching Case Question:</h6>
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
                <label for="titleofquestion">Title of Question</label>
                <input type="text" class="form-control" id="titleofquestion" wire:model="title">
            </div>
            <div class="form-group">
                <label for="descriptionofquestion">Description of Question</label>
                <textarea class="form-control" id="descriptionofquestion" wire:model="question_body"></textarea>
            </div>
            @forelse($answers as $index => $answer)
            <div class="form-group">
            
            <div class="row align-items-end">
                <div class="col-5">
                    <label for="answer{{ $index }}.left">Prompts {{ $loop->iteration }}</label>
                    <input type="text" class="form-control" id="answer{{ $index }}.left" wire:model="answers.{{ $index }}.left">
                </div>
                <div class="col-5">
                    <label for="answer{{ $index }}.right">Answer {{ $loop->iteration }}</label>
                    <input type="text" class="form-control" id="answer{{ $index }}.right" wire:model="answers.{{ $index }}.right">
                </div>
                <div class="col-2">
                    <button id="delete{{ $index }}" class="btn btn-sm btn-danger btn-circle" wire:click.prevent="removeAnswer('{{ $index }}')"><i class="fa fa-times"></i></button>
                </div>
            </div>
            </div>
            @empty 
            @endforelse
            
            

            <button wire:click.prevent="addNewAnswer" class="btn btn-success btn-icon-split float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
            </button>
            
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
    


    {{--@include('livewire.factory.question.matching-case-question.review')--}}
</div>