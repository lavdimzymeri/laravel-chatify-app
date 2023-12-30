<?php

namespace App\Http\Controllers;

use App\Models\CoinRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function payment(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));

        $unitAmount = (int) ($request->price * 100);

        $response = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Mobile Phone'
                        ],
                        'unit_amount' => $unitAmount,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('stripe_success'),
            'cancel_url' => route('stripe_cancel'),
        ]);

        session(['price' => $request->price]);

        return redirect()->away($response->url);
    }

    public function success()
    {
        $price = session('price');

        CoinRequest::create([
            'coins_requested' => $price * 10,
            'user_id' => Auth::user()->id,
        ]);
        return "Payment is successful!";
    }

    public function cancel()
    {
        return "Payment is cancelled!";
    }
}
