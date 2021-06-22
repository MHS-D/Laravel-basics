<?php

namespace App\Http\Controllers;

use App\Models\meetings;
use Illuminate\Http\Request;

class hitos_payment extends Controller
{
    public function checkout($id,$amount)
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51IP5ilLntGb6Ni6L3rt5kZUC3B5fOOvRndyiZcG5sJWgoz1wWt4CqoKs3ddMYo8fhC28120mgG3VerdGkJXaCW2Y00mqPrckZo');

		$amount = 500;
        $temp = $amount;
		$amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'usd',
			'description' => 'Payment From MHMD HS',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('hitos.payment',compact('intent'),['amount'=>$temp,'id'=>$id]);

    }

    public function afterPayment(Request $req)
    {
        meetings::where('id',$req->id)->update(['is_payed'=>'yes']);
        return back()->with('message', 'payment has been  Succesfully added');
    }
}
