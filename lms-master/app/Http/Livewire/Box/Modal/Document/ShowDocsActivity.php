<?php

namespace App\Http\Livewire\Box\Modal\Document;

use App\Models\Document;
use App\Models\File;
use Livewire\Component;

class ShowDocsActivity extends Component
{

    public string $search = '';
    public string $route;
    public int $document;
    public  $documents;
    public $documentId;

    public function mount($documentId)
    {
        $this->documentId = $documentId;
        $this->documents = Document::find($documentId);
    }

    /**
     * Show the form for showing the specified resource.
     *
     * @param  Document  $document
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render(Document $document)
    {

        $search = '%' . $this->search . '%';
        $files = File::where('description', 'LIKE', '%' . $search . '%')
        ->orderby('updated_at', 'desc')
        ->paginate(env('PAGINATION'));
        return view('livewire.box.modal.document.show-docs-activity', compact('document', 'files'));
    }

    
}
