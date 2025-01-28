<button type="button" class="green-button" data-target="#docs_{{ $documents->id }}"
    data-toggle="modal">Show Document</button>

<div class="modal fade" id="docs_{{ $documents->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog custom-modal" role="file">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Document</h5>
                <button type="button" class="close" aria-label="Close"
                    onclick="customCloseAddDocumentModal('{{ $documents->id }}')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body addQuestion-modal-body">

                <div class="row">
                <div class="col-6">
                    <div class="card shadow mb-4 border-bottom-success card-body-question">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold">{{ __("Document") }}</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="text-center">
                                <h5>
                                {{ $documents->title }}
                                </h5>
                                <p>
                                    {!! $documents->description !!}
                                </p>
            
                                <hr/>
                                
                                @forelse ($documents->Files as $file)
                                
                                <x-box.item
                                :title="$file->description">
                                @if(!$loop->first)
                                    @slot('up')
                                        {{ route('changeModalOrderFile' , ['from' => $file->pivot->id , 'move' => 'up' ]) }}
                                    @endslot
                                @endif
                                @if(!$loop->last)
                                    @slot('down')
                                        {{ route('changeModalOrderFile' , ['from' => $file->pivot->id , 'move' => 'down' ]) }}
                                    @endslot
                                @endif
                            
                                @slot('delete')
                                    {{ route('deleteDocsDocument' ,['documentFile' => $file->pivot->id ]) }}
                                @endslot
                            
                                </x-box.item>
                                
                                @empty  
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-6">
                    <div class="card shadow mb-4 border-bottom-success">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold">{{ __("Files") }}</h6>
                            <div class="dropdown no-arrow">
                                <div class="dropdown no-arrow">
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="text-center">
                                @livewire('container.show-files', [
                                    'route' => 'addModalFileToDocument',
                                    'document' => $documents->id
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" aria-label="Close"
                        onclick="customCloseAddDocumentModal('{{ $documents->id }}')">Close</button>
                </div>

            
            </div>
        </div>
    </div>
</div>

@if(session('showModal1') && session('showModal1') == $documents->id)
    <script>
        $(document).ready(function () {
            // Show the modal based on the quiz ID
            $('#docs_{{ $documents->id }}').modal('show');
        });
    </script>
@endif
