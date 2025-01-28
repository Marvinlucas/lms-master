<?php

namespace App\Http\Livewire\Box;

use App\Models\Badge;
use Livewire\Component;
use Livewire\WithPagination;

class CertificateActivity extends Component
{
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';

    public $session;
    public $activity;

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        $badges =  Badge::paginate();
        return view('livewire.box.certificate-activity', compact([
            'badges'
        ]));
    }
      
}
