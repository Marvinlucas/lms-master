<?php

namespace App\Actions\Fortify;

use App\Models\Role;
use App\Models\User;
use App\Services\Units\Coins\CoinsForRegisterNewUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class)],
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_initial' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => [
                'required',
                'string',
                'min:8', // Minimum length of 8 characters
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$_%^&+=!]).*$/',
                'confirmed',
            ],
            'password_confirmation' => ['required', 'string', 'same:password'], // Add password confirmation field
        ], [
            'password_confirmation.same' => 'The password confirmation does not match the password.', // Custom error message
            'password.min' => 'The password must be at least 8 characters long.',
            'password.regex' => 'Password needs uppercase, lowercase, number, and symbol.',
            'password.confirmed' => 'The password confirmation does not match the password.',
            'username.unique' => 'The username is already taken.',
        ])->validate();

        // Set the default role ID
        $input['role_id'] = 4;

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'last_name' => $input['last_name'],
            'middle_initial' => $input['middle_initial'],
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
            'role_id' => $input['role_id'], // Assign the default role ID
        ]);

         // Attach the role to the user in the model_has_roles pivot table
         $role = Role::find($input['role_id']);

         if ($role) {
             $user->roles()->attach($role, [
                 'model_type' => get_class($user),
                 'model_id' => $user->id,
             ]);
         }

        app(CoinsForRegisterNewUser::class)->executed($user);

        return $user;
    }
}
