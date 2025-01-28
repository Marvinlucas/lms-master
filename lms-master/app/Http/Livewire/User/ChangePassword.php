<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    use WithFileUploads;

    public User $user;

    public $current_password;
    public $new_password;
    public $new_password_confirmation;
    public $successMessage = '';
    public $successMessageVisible = false;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    // Method to clear the success message
    public function clearSuccessMessage()
    {
        $this->successMessage = '';
    }


    public function changePassword()
    {

        $this->successMessage = '';

        $validator = Validator::make(
            [
                'current_password' => $this->current_password,
                'new_password' => $this->new_password,
                'new_password_confirmation' => $this->new_password_confirmation,
            ],
            [
                'current_password' => 'required',
                'new_password' => [
                    'required',
                    'min:8', // Minimum length of 8 characters
                    'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$_%^&+=!]).*$/',
                    'confirmed',
                ],
            ],
            [
                'current_password.required' => 'Current password is required.',
                'new_password.required' => 'New password is required.',
                'new_password.min' => 'The new password must be at least 8 characters long.',
                'new_password.regex' => 'Password needs to contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
                'new_password.confirmed' => 'The password confirmation does not match the new password.',
            ]
        );
        if ($validator->fails()) {
            $this->addError('changePassword', $validator->messages()->first());
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

        // Set success message
        $this->successMessage = 'Password changed successfully!';
    }


    public function render()
    {
        return view('livewire.user.change-password');
    }
}
