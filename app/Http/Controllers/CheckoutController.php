<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paymentdetail;
use Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51I4KBtLpc7UbWTUbtgAN1jowT4Qug3p0OfVfSmwzR5veYs4sap1b43MdtpinvwZz4Ev9GXTiPvQk4AEHgyQuogax00mL6VXEqe');
        		
		$amount = 1600;
		$amount *= 1;
        $amount = (int) $amount;
        
        $name = Auth::user()->name;
        echo $name;

        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Society Maintenance Payment',
            'amount' => $amount,
            'currency' => 'INR',
			'description' => 'Payment From Softcare',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;
        // echo "<pre>";
        // print_r($intent);
		return view('checkout.credit-card',compact('intent'));

    }
    public function afterPayment(Request $request)
    {
        echo 'Payment Has been Received';

        
        // $data= new paymentdetail;
        // $data->description=$request->get('description');
        // $data->save();
    }
}
