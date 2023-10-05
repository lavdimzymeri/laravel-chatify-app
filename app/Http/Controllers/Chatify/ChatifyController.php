<?php

namespace App\Http\Controllers\Chatify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChMessage;
use Carbon\Carbon;

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
    
        return view('chatify.stats', compact(
            'totalMessagesSentLastWeek',
            'totalMessagesReceiveLastWeek',
            'totalMessagesSentLastMonth',
            'totalMessagesReceiveLastMonth',
            'totalMessagesSentThisYear',
            'totalMessagesReceiveThisYear'
        ));
    }
}
