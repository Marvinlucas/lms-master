<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    use WithFileUploads;

    public User $user;
    public $name;
    public $username;
    public $last_name;
    public $middle_initial;
    public $phone_number;
    public $address;
    public $birthday;
    public $profile_picture;
    public $updateProfilePicture;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;
    public $successMessage = '';
    public $successMessageVisible = false;
    public $uploadProgress = 0;


    public function mount(User $user)
    {
        $this->user = $user;
        $this->username = $user->username;
        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->middle_initial = $user->middle_initial;
        $this->address = $user->address;
        $this->birthday = $user->birthday;
        $this->phone_number = $user->phone_number;
    }

    public function updateProfile()
    {
        // Clear the success message before updating the profile
        $this->successMessage = '';

        $validator = Validator::make(
            [
                'name' => $this->name,
                'username' => $this->username,
                'last_name' => $this->last_name,
                'middle_initial' => $this->middle_initial,
                'address' => $this->address,
                'phone_number' => $this->phone_number,
                'birthday' => $this->birthday,
            ],
            [
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'phone_number' => 'required|string|max:15',
                'birthday' => 'required|date',
                'middle_initial' => 'required|string|max:255',
            ]
        );

        if ($validator->fails()) {
            $this->addError('updateProfile', 'Please fill up all fields.');
            return;
        }

        $this->user->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'middle_initial' => $this->middle_initial,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'birthday' => $this->birthday,

        ]);

        // Set success message
        $this->successMessage = 'Profile updated successfully';
    }

    public function updatedProfilePicture($value)
    {
        if ($value) {
            $this->profile_picture = $value;
        }
    }

    public function updateProfilePicture()
    {
        if ($this->profile_picture) {
            $path = $this->profile_picture->store('profile_pictures', 'public');
            $this->user->update([
                'profile_picture' => $path
            ]);

            // Reset the profile_picture property
            $this->profile_picture = null;

            // Add a success message
            session()->flash('success', 'Profile picture updated successfully');

            $this->emit('profilePictureUpdated');
        } else {
            // Add a danger message
            session()->flash('danger', 'Profile picture update failed. Please try again.');

            return redirect()->back();
        }
    }




    // Method to clear the success message
    public function clearSuccessMessage()
    {
        $this->successMessage = '';
    }


    public function changePassword()
    {

        $validator = Validator::make(
            [
                'current_password' => $this->current_password,
                'new_password' => $this->new_password,
                'new_password_confirmation' => $this->new_password_confirmation,
            ],
            [
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]
        );

        if ($validator->fails()) {
            $this->addError('changePassword', 'Please check the password fields.');
            return;
        }

        if (!Hash::check($this->current_password, $this->user->password)) {
            $this->addError('changePassword', 'Current password is incorrect.');
            return;
        }

        $this->user->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->current_password = '';
        $this->new_password = '';
        $this->new_password_confirmation = '';

        session()->flash('success', 'Password changed successfully!');
    }

    public function render()
    {
        $profilePictureUrl = asset('storage/' . $this->user->profile_picture);

        return view('livewire.user.profile', compact('profilePictureUrl'));
    }
}