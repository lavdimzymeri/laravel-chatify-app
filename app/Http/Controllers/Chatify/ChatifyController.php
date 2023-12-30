<?php

namespace App\Http\Controllers\Chatify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChMessage;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ChatifyController extends Controller
{

    public function count()
    {
        $user = auth()->user();

        // Calculate the start and end dates for the last week
        $startDateLastWeek = Carbon::now()->subWeek();
        $endDateLastWeek = Carbon::now();

        // Calculate the start and end dates for the last month
        $startDateLastMonth = Carbon::now()->subMonth();
        $endDateLastMonth = Carbon::now();

        // Calculate the start and end dates for this year
        $startDateThisYear = Carbon::now()->startOfYear();
        $endDateThisYear = Carbon::now()->endOfYear();

        $startDay = Carbon::now()->startOfDay();
        $endDay = Carbon::now()->endOfDay();
        // Count messages sent and received for the last week
        $totalMessagesSentLastWeek = ChMessage::where('from_id', $user->id)
            ->whereBetween('created_at', [$startDateLastWeek, $endDateLastWeek])
            ->count();

        $totalMessagesReceiveLastWeek = ChMessage::where('to_id', $user->id)
            ->whereBetween('created_at', [$startDateLastWeek, $endDateLastWeek])
            ->count();

        // Count messages sent and received for the last month
        $totalMessagesSentLastMonth = ChMessage::where('from_id', $user->id)
            ->whereBetween('created_at', [$startDateLastMonth, $endDateLastMonth])
            ->count();

        $totalMessagesReceiveLastMonth = ChMessage::where('to_id', $user->id)
            ->whereBetween('created_at', [$startDateLastMonth, $endDateLastMonth])
            ->count();

        // Count messages sent and received for this year
        $totalMessagesSentThisYear = ChMessage::where('from_id', $user->id)
            ->whereBetween('created_at', [$startDateThisYear, $endDateThisYear])
            ->count();

        $totalMessagesReceiveThisYear = ChMessage::where('to_id', $user->id)
            ->whereBetween('created_at', [$startDateThisYear, $endDateThisYear])
            ->count();

        $totalMessagesSentThisDay = ChMessage::where('from_id', $user->id)
            ->whereBetween('created_at', [$startDay, $endDateLastWeek])
            ->count();

        $totalMessagesReceiveThisDay = ChMessage::where('to_id', $user->id)
            ->whereBetween('created_at', [$startDay, $endDay])
            ->count();

        return view('chatify.stats', compact(
            'totalMessagesSentLastWeek',
            'totalMessagesReceiveLastWeek',
            'totalMessagesSentLastMonth',
            'totalMessagesReceiveLastMonth',
            'totalMessagesSentThisYear',
            'totalMessagesReceiveThisYear',
            'totalMessagesSentThisDay',
            'totalMessagesReceiveThisDay'
        ));
    }
}
