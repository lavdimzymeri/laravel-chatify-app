<?php

namespace App\Http\Controllers;

use App\Events\DummyEvent;
use App\Models\Profiles;
use App\Models\User;
use App\Notifications\UserFollowNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FindFriendsController extends Controller
{
    public function index()
    {
        $allUsers = User::all();
        $filteredUsers = $allUsers->filter(function ($user) {
            return $user->getRole() == 'moderator';
        });
    
        $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();
        $perPage = 30;
        $currentPageItems = $filteredUsers->slice(($currentPage - 1) * $perPage, $perPage)->all();
    
        $users = new \Illuminate\Pagination\LengthAwarePaginator(
            $currentPageItems,
            count($filteredUsers),
            $perPage,
            $currentPage,
            ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
        );
    
        return view('user.findFriends', compact('users'));
    }

    public function notify()
    {
        if (auth()->user()) {
            $notifiableUsers = User::all();
            // $notifiableUsers = User::all()->where('id' , 2);

            // dd($notifiableUsers);
            foreach ($notifiableUsers as $user) {
                $user->notify(new UserFollowNotification(auth()->user()));
            }

            broadcast(new DummyEvent(auth()->user()->name));
        }

        return response()->json(['message' => 'Notifications sent']);
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

    public function search(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('username', 'like', '%' . $search . '%')
            ->orderBy('gender', 'desc')
            ->paginate(15);

        return view('user.findFriends', compact('users', 'search'));
    }

    public function profilesModerator()
    {
        $authUserId = Auth::id();

        $profiles = Profiles::where('moderator_id', $authUserId)
            ->with('user')
            ->get();

        return view('user.profiles-moderator', compact('profiles'));
    }

    public function loginAsUser(User $user)
    {
        Auth::login($user);
        return redirect('/chatify');
    }
}
