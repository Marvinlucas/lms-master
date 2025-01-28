<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    $users = User::all(); // Fetch all users
    return view('components.front.member', ['users' => $users]);
}
}
