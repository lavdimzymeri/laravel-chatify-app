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
        $users = User::orderBy('gender', 'desc')->paginate(15);

        return view('user.findFriends', compact('users')); 
    }

    public function profiles()
    {
        $tests = User::all();
        $tests = User::paginate(15);
        $tests = User::orderByRaw("CASE WHEN gender = 'female' THEN 0 ELSE 1 END")
        ->orderBy('created_at', 'desc')
        ->paginate(15);
        
        return view('user.profiles', compact('tests')); 
    }
}
