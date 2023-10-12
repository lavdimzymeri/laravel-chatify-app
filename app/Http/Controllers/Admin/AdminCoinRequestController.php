<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoinRequest;
use Illuminate\Http\Request;

class AdminCoinRequestController extends Controller
{
    public function index()
    {
        $pendingRequests = CoinRequest::where('status', 'pending')->get();

        return view('admin.coin_requests', compact('pendingRequests'));
    }

    public function approveRequest($id)
    {
        $coinRequest = CoinRequest::findOrFail($id);

        if ($coinRequest->status === 'approved') {
            return redirect()->back()->with('error', 'Coin request already approved');
        }

        $coinRequest->update(['status' => 'approved']);
        $user = $coinRequest->user;

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        $user->coins += $coinRequest->coins_requested;
        $user->save();

        return redirect()->back()->with('success', 'Coin request approved');
    }

    public function cancelRequest($id)
    {
        $coinRequest = CoinRequest::findOrFail($id);
        $coinRequest->update(['status' => 'canceled']);

        return redirect()->back()->with('success', 'Coin request canceled');
    }
}
