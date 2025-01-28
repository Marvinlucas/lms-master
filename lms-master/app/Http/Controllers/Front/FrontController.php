<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Front\HomeServices;

class FrontController extends Controller
{


    /**
     * Make HomePage Index
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(HomeServices $homeServices)
{
    // Your existing code
    $homeCompactReturn = $homeServices->homeIndex();

    // Retrieve users with role_id 1, 2, or 3 with the 'userRole' relationship
    $users = User::whereIn('role_id', [1, 2, 3])->with('userRole')->get();

    // Check if there are users before adding them to the data
    if ($users->isNotEmpty()) {
        // Add the user data to the existing data
        $data = array_merge($homeCompactReturn, ['users' => $users]);
    } else {
        // If no users, you can handle this case (e.g., show a message)
        $data = $homeCompactReturn;
    }

    return view('contents.front.index.welcome', $data);
}


    
    

}
