<?php

namespace App\Http\Livewire\Admin\Configuration;

use App\Models\Certificate;
use App\Traits\WithRuleUploaded;
use Livewire\Component;
use Livewire\WithFileUploads;

class CertificateContent extends Component
{
    use WithFileUploads, WithRuleUploaded;

    public $position_1;
    public $position_2;
    public $name_1;
    public $name_2;
    public $signature_1;
    public $signature_2;
    public $logo;
    public $background;
    public $isUploading1;
    public $isUploading2;
    public $isUploading3;
    public $isUploading4;

    public function rules()
    {
        return [
            'position_1' => 'nullable|alpha_num',
            'position_2' => 'nullable|alpha_num',
            'name_1' => 'nullable|alpha_num',
            'name_2' => 'nullable|alpha_num',
            'signature_1' => 'nullable|image|max:2048', // Make sure it's an image file
            'signature_2' => 'nullable|image|max:2048', // Make sure it's an image file
            'background' => 'nullable|image|max:2048', // Make sure it's an image file
            'logo' => 'nullable|image|max:2048', // Make sure it's an image file
        ];
    }

    public function mount()
    {
        // Initialize the values from your database
        $config = Certificate::first(); // Assuming you have a Config model
        $this->position_1 = $config->position_1;
        $this->position_2 = $config->position_2;
        $this->name_1 = $config->name_1;
        $this->name_2 = $config->name_2;
    }

    public function updatePositions()
    {
        // Update the "config_value" in the database for position_1 and position_2
        $config = Certificate::first(); // Assuming you have a Config model
        $config->update([
            'position_1' => $this->position_1,
            'position_2' => $this->position_2,
        ]);
        session()->flash('message', 'Positions updated successfully!');
    }

    public function updateName()
    {
        // Update the "config_value" in the database for position_1 and position_2
        $config = Certificate::first(); // Assuming you have a Config model
        $config->update([
            'name_1' => $this->name_1,
            'name_2' => $this->name_2,
        ]);
        session()->flash('message', 'Positions updated successfully!');
    }

    public function updatedSignature1()
    {
        $this->validate([
            'signature_1' => 'nullable|image|max:2048',
        ]);

        if ($this->signature_1) {
            if (!$this->signature_1->isValid()) {
                $this->addError('signature_1', 'The uploaded file is not a valid image.');
                return;
            }

            $this->isUploading1 = true; // Set isUploading to true during the upload
            $filename = uniqid() . '.' . $this->signature_1->getClientOriginalExtension();
            $this->signature_1->storeAs('public/signatures1', $filename);


            $config = Certificate::first();
            $config->update(['signature_1' => 'public/signatures1/' . $filename]);

            $this->signature_1 = null; // Clear the file input field
            $this->isUploading1 = false; // Set isUploading to false after successful upload
            session()->flash('message', 'Signature 1 updated successfully!');
        }
    }

    public function updatedSignature2()
    {
        $this->validate([
            'signature_2' => 'nullable|image|max:2048',
        ]);

        if ($this->signature_2) {
            $this->isUploading2 = true; // Set isUploading to true during the upload
            $filename = uniqid() . '.' . $this->signature_2->getClientOriginalExtension();
            $this->signature_2->storeAs('public/signatures2', $filename);

            $config = Certificate::first();
            $config->update(['signature_2' => 'public/signatures2/' . $filename]);

            $this->signature_2 = null; // Clear the file input field
            $this->isUploading2 = false; // Set isUploading to false after successful upload
            session()->flash('message', 'Signature 2 updated successfully!');
        }
    }

    public function updatedBackground()
    {
        $this->validate([
            'background' => 'nullable|image|max:2048',
        ]);

        if ($this->background) {
            $this->isUploading3 = true; // Set isUploading to true during the upload
            $filename = uniqid() . '.' . $this->background->getClientOriginalExtension();
            $this->background->storeAs('public/background', $filename);

            $config = Certificate::first();
            $config->update(['background' => 'public/background/' . $filename]);

            $this->background = null; // Clear the file input field
            $this->isUploading3 = false; // Set isUploading to false after successful upload
            session()->flash('message', 'Background updated successfully!');
        }
    }


    public function updatedLogo()
    {
        $this->validate([
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($this->logo) {
            $this->isUploading4 = true; // Set isUploading to true during the upload
            $filename = uniqid() . '.' . $this->logo->getClientOriginalExtension();
            $this->logo->storeAs('public/logo', $filename);

            $config = Certificate::first();
            $config->update(['logo' => 'public/logo/' . $filename]);

            $this->logo = null; // Clear the file input field
            $this->isUploading4 = false; // Set isUploading to false after successful upload
            session()->flash('message', 'Logo updated successfully!');
        }
    }

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {

        return view('livewire.admin.configuration.certificate-content');
    }
}
