<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FindFriendsController extends Controller
{
    public function index()
    {
        $users = User::all();
        $users = User::paginate(30);

        return view('user.findFriends', compact('users')); 
    }
}
