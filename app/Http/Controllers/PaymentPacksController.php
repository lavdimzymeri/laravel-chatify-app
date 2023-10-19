<?php

namespace App\Http\Controllers;

use App\Models\PaymentPack;
use Illuminate\Http\Request;

class PaymentPacksController extends Controller
{
    
        public function index()
        {
            $paymentPacks = PaymentPack::all();
            return view('components-project.payment', ['paymentPacks' => $paymentPacks]);
        }
}
