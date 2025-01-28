<?php

namespace App\Http\Livewire\Admin\Configuration;

use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CertiificatePreview extends Component
{
    public $logo;
    public $signature_1;
    public $signature_2;
    public $background;
    public $position_1;
    public $position_2;
    public $name_1;
    public $name_2;

    public function render()
    {
        $certificate = Certificate::first();
        $this->logo = Storage::url($certificate->logo);
        $this->signature_1 = Storage::url($certificate->signature_1);
        $this->signature_2 = Storage::url($certificate->signature_2);
        $this->background = Storage::url($certificate->background);
        $this->position_1 = $certificate->position_1;
        $this->position_2 = $certificate->position_2;
        $this->name_1 = $certificate->name_1;
        $this->name_2 = $certificate->name_2;
        return view('livewire.admin.configuration.certiificate-preview', compact('certificate'));
    }


    
    
}