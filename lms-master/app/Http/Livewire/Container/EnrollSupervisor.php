<?php

namespace App\Http\Livewire\Container;

use App\Models\Term;
use App\Models\User;
use Livewire\Component;
use App\Models\Participant as ModelsParticipant;
use App\Models\Role;

class EnrollSupervisor extends Component
{
    public string $search = '';
    protected $usersData;
    public Term $term;

    public function mount(Term $term)
    {
        $this->term = $term; // Initialize the $term variable with the passed value.
        $this->termUpdated();
    }
    

    public function addParticipantToTerm(User $user, Role $role)
    {
        // Check if the user is already associated with the term
        if (!$this->term->participants->contains($user->id)) {
            $this->term->participants()->attach($user, ['role_id' => $role->id]);
            $this->termUpdated();
        } else {
            // Handle the case where the user is already added
            // You can add a flash message or log a warning, depending on your needs
            // For example:
            // session()->flash('warning', 'User is already added to the term.');
        }
    }

    public function deleteParticipantAsTerm(ModelsParticipant $participant){
        $participant->delete();
        $this->termUpdated();
    }

    public function termUpdated()
    {
        $this->term = Term::with('Participants')->find($this->term->id);
    }

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        $search = '%' . $this->search . '%';
    
        $this->usersData = User::where(function ($query) use ($search) {
                $query->where('name', 'LIKE', $search)
                    ->orWhere('email', 'LIKE', $search);
            })
            ->where('role_id', 2)  // Add this line to filter by role_id
            ->orderBy('updated_at', 'desc')
            ->paginate();
    
        return view('livewire.container.enroll-supervisor');
    }
    
}
