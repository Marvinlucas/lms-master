<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\SyncPermissions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    use SyncPermissions;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {

        $users = User::paginate();
        return view("contents.admin.acl.user.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {

        return view('contents.admin.acl.user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'last_name' => $request->last_name,
            'middle_initial' => $request->middle_initial,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $this->syncPermissions($request, $user);


        $role = $user->roles->first(); // Assuming a user can have only one role
        if ($role) {
            $user->role_id = $role->id;
            $user->save();
    
            // Update the role_id in the term_user table
            DB::table('term_user')
                ->where('user_id', $user->id)
                ->update(['role_id' => $role->id]);
        }

        
        return redirect()
            ->route("user.index")
            ->with('success', __('item created successfully'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(User $user)
    {
        return view('contents.admin.acl.user.form', compact(
            "user"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  User  $user
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
         // Add this at the beginning of your controller

         public function update(UserRequest $request, User $user)
{
    $user->name = $request->name;
    $user->username = $request->username;
    $user->last_name = $request->last_name;
    $user->middle_initial = $request->middle_initial;
    $user->email = $request->email;
    
    if ($request->password != '') {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    // Sync roles and permissions
    $this->syncPermissions($request, $user);

    // Save the role_id in the Users table
    $role = $user->roles->first(); // Assuming a user can have only one role
    if ($role) {
        $user->role_id = $role->id;
        $user->save();

        // Update the role_id in the term_user table
        DB::table('term_user')
            ->where('user_id', $user->id)
            ->update(['role_id' => $role->id]);
    }

    return redirect()
        ->route("user.index")
        ->with('warning', __('item updated successfully'));
}
         
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()
                ->route("user.index")
                ->with('danger', __('item deleted successfully'));
        } catch (\Exception $e) {
            return redirect()
                ->route("user.index")
                ->with('danger', __('Delete is not Completed, Please check child of this user'));
        }
    }
}
