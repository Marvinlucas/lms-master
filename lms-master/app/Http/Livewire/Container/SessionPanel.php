<?php

namespace App\Http\Livewire\Container;

use App\Models\Session;
use App\Models\Term;
use Livewire\Component;

class SessionPanel extends Component
{

    public string $search = '';

    public string $route;
    public int $parent;

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        /**
         *  get the current term
         **/
        $term = Term::findOrFail($this->parent);
    
        /**
         *  Filter sessions by term_id
         **/
        $search = '%' . $this->search . '%';
        $sessions = Session::where('title', 'LIKE', $search)
            ->where('term_id', $term->id) // Filter sessions by term_id
            ->orderBy('updated_at', 'desc')
            ->paginate();
    
        return view('livewire.container.session-panel', [
            'sessions' => $sessions
        ]);
    }
}


