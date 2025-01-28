<?php
namespace App\Http\Livewire\Container;

use App\Models\Participant as ModelsParticipant;
use App\Models\Role;
use App\Models\Term;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class EnrollParticipants extends Component
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
        try {
            $participant->delete();
            $this->termUpdated();
    
            // Flash a success message to the session
            Session::flash('success', 'Participant deleted successfully.');
    
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
    
            // Check if the error is due to a foreign key constraint violation
            if ($errorCode == 1451) {
                // Show a message indicating that the deletion is not possible due to a foreign key
                Session::flash('error', 'Cannot delete this participant. It is associated with other records.');
            } else {
                // If it's a different type of database exception, you may want to handle it accordingly
                Session::flash('error', 'An error occurred while deleting the participant.');
            }
        }
        
        return response()->json([], 500); // Always return a response
    
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
            ->where('role_id', 4)  // Add this line to filter by role_id
            ->orderBy('updated_at', 'desc')
            ->paginate();
    
        return view('livewire.container.enroll-participants');
    }
    

}