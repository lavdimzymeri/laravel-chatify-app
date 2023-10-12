<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoinRequest;
use Illuminate\Support\Facades\Auth;

class CoinRequestController extends Controller
{
    public function showRequestForm()
    {
        return view('coin.request_form');
    }

    public function submitRequest(Request $request)
    {
        $request->validate([
            'coins' => 'required|integer|min:1',
        ]);

        $user = Auth::user();

        CoinRequest::create([
            'user_id' => $user->id,
            'coins_requested' => $request->input('coins'),
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Coin request submitted successfully');
    }
}
