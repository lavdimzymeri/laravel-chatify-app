<?php

namespace App\Http\Controllers;

use App\Events\DummyEvent;
use App\Models\User;
use App\Notifications\UserFollowNotification;
use Illuminate\Support\Facades\Notification;

class NotificationControllerLavda extends Controller
{
    public function notify()
    {
        if (auth()->user()) {
            $notifiableUsers = User::all();

            foreach ($notifiableUsers as $user) {
                $user->notify(new UserFollowNotification(auth()->user()));
            }

            broadcast(new DummyEvent(auth()->user()->name));
        }

        return response()->json(['message' => 'Notifications sent']);
    }
}
