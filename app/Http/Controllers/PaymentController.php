<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Redirect;

use Auth;

use App\Card;

use App\Plan;

use Stripe\Charge;
use Stripe\Stripe;

use App\Transaction;

class PaymentController extends Controller
{
    

    public function checkout(Request $request){
		
    	\Stripe\Stripe::setApiKey ( 'sk_test_L8vXoRU951ibLsL0U0jicE0H00kcB9Ouvn' );
			try {
				\Stripe\Charge::create ( array (
						"amount" => 300 * 100,
						"currency" => "usd",
						"source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
						"description" => "Chilling Loccini OFR." 
				) );
				Session::flash ( 'success-message', 'Payment done successfully !' );


				return Redirect::back ();
			}
			catch ( \Exception $e ) {
				Session::flash ( 'fail-message', "Error! Please Try again." );
				return Redirect::back ();
			}
	}

	public function addmoney(Plan $plan){
		return view('pages.addmoney',['plan'=>$plan]);
	}

	public function topup(Request$request){
    	Stripe::setApiKey('sk_test_L8vXoRU951ibLsL0U0jicE0H00kcB9Ouvn');
		
		try{
			// Stripe::create([
			//   'amount' => $request['sum']*100,
			//   'currency' => 'ngn',
			//   'source' => $request['stripeToken'],
			//   'description' => 'Naija charge',
			// ]);

			$charge=Charge::create(array(
	 			"amount" => $request['sum']*100,
	 			"currency" => "ngn",
	 			"source" => $request['stripeToken'],
	 			"description" => "AfroSave Top Up!"
	 		));

		}
		catch(\Exception $e){
			return $e->getMessage();
			return redirect()->route('topup')->with('error',$e->getMessage());
		}

		$plan= Plan::find($request['plan']);

		$MainPlan= Plan::find($plan->id);
		$MainPlan->balance=$MainPlan->balance+$request['sum'];
		$MainPlan->save();

		 $transaction= new Transaction;
         $transaction->user_id=Auth::user()->id;
         $transaction->amount=$request['sum'];
         $transaction->description="Top up for plan ". $MainPlan->plane_name; 
         $transaction->save();

         $target_status= 0;

        if ($plan->balance>$plan->target_amount) {
            $target_status=1;    
        }

         $matured=0;
        $ldate = date('Y-m-d');
        if ($ldate>=$plan->maturity_date) {
            $matured=1 ;
        }


		$amount_remaining= number_format($MainPlan->target_amount-$MainPlan->balance,2,'.',',');
  		return view('pages.singleplan',['plan'=>$MainPlan,'rem'=>$amount_remaining,'message'=>'Payment Successful!','status'=>1,'target_status'=>$target_status,'matured'=>$matured]);




    }



}
