<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Plan;
use App\User;
use App\Transaction;
class PlanController extends Controller
{
    public function create(){
    	return view('pages.create');
    }

    public function saveplan(Request $request){
    	$request->validate([
    		'plan_name' => 'required',
    		'plan_type' => 'required',
    		'target_amount' => 'required',
    		'maturity_date' => 'required',
    	]);

    	$plan = new Plan;
    		$plan->plane_name=$request['plan_name'];
    		$plan->plan_type= $request['plan_type'];
    		$plan->target_amount= $request['target_amount'];
    		$plan->maturity_date= $request['maturity_date'];
    		$plan->user_id= Auth::user()->id;
    	

    	if ($plan->save()) {
    		
    		return view('pages.create',['message'=>'Plan has been created successfully', 'status'=>1]);
    	}
    	else{
    		return "error!!";
    	}


    }

    public function plan(Plan $plan){
        
        $amount_remaining= number_format($plan->target_amount-$plan->balance,2,'.',',');
        $target_status= 0;

        if ($plan->balance>$plan->target_amount) {
            $target_status=1;    
        }
        $matured=0;
        $ldate = date('Y-m-d');
        if ($ldate>=$plan->maturity_date) {
            $matured=1 ;
        }

       
     
        return view('pages.singleplan',['plan'=>$plan,'rem'=>$amount_remaining, 'status'=>0,'target_status'=>$target_status,'matured'=>$matured]);
    }

    public function edit(Plan $plan){
      return view('pages.editplan',['plan'=>$plan]);
    }

    public function update(Request $request){
        $plan_id= $request['plan_id'];

        $request->validate([
            'plan_name' => 'required',
            'plan_type' => 'required',
            'target_amount' => 'required',
        ]);

        $plan=Plan::find($plan_id);

        $plan->plane_name=$request['plan_name'];
        $plan->plan_type= $request['plan_type'];
        $plan->target_amount= $request['target_amount'];

        if ($plan->save()) {
            
             return view('pages.editplan',['message'=>'Plan has been updated successfully', 'status'=>1, 'plan'=>$plan]);
           
        }
        else{
            return "error!!";
        }

        

    }

    public function transfer(Plan $plan){
        $user_id=Auth::user()->id;
        $myplans= Plan::where('user_id','=',$user_id)->get();
        return view('pages.transfer',['plan'=>$plan, 'myplans'=>$myplans]);
    }

    public function sendFund(Request $request){
        $request->validate([
            'to' => 'required',
            'amount' => 'required',
        ]);

        $plan=Plan::find($request['plan_id']);
        $user_id=Auth::user()->id;
        $myplans= Plan::where('user_id','=',$user_id)->get();
        
        $from= $request['plan_id'];
        $to= $request['to'];
        $amount= $request['amount'];
        $fromBalance= $request['balance'];


       
        if ($amount>$fromBalance) {
            
            return view('pages.transfer',['plan'=>$plan, 'myplans'=>$myplans,'message'=>'Insufficient Funds', 'status'=>2]);
            
        }

        else{
            $newFromBalance= $fromBalance-$amount;

            $Fplan= Plan::find($from);
            $Fplan->balance=$newFromBalance;

            $Tplan= Plan::find($to);
            $Tplan->balance= $Tplan->balance+$amount;

            $FromplanName=Plan::where('id','=',$from)->first();
            $ToplanName=Plan::where('id','=',$to)->first();
            
         
            
            $transaction= new Transaction;
            $transaction->user_id=Auth::user()->id;
            $transaction->amount=$amount;
            $transaction->description="Transferred From ".$FromplanName->plane_name. "  To  ".  $ToplanName->plane_name; 


            if ($Fplan->save() && $Tplan->save() && $transaction->save()) {

            return view('pages.transfer',['plan'=>$plan, 'myplans'=>$myplans,'message'=>'Fund has been transfered successfully', 'status'=>1]);
            }
            else{
                return 'error';
            }


        }// end else


       


        
    }

    public function getEdit(){
        $plans= Auth::user()->plans()->get();
         $balance= Plan::where('user_id','=',Auth::user()->id)->get()->sum('balance');
        return view('pages.plan',['plans'=>$plans]);  
    }

    public function getHistory(){
        $transaction= Auth::user()->transactions()->get();
        return view('pages.transactions',['transactions'=>$transaction]);
    }

    public function withdraw(Plan $plan){
        return view('pages.withdraw',['plan'=>$plan]);
    }

    public function debit(Request $request){
        $plan_id=$request['plan'];
        $amount= $request['sum'];
        $plan=Plan::find($plan_id);

        if ($amount=='') {
            return view("pages.withdraw",['message'=>'Enter Amount','plan'=>$plan]);
           }
        elseif ($plan->balance<$amount) {
           return view("pages.withdraw",['message'=>'Insufficient funds','plan'=>$plan]); 
        }
        else{
            
            $plan->balance= $plan->balance-$amount;
            $plan->save();

         $transaction= new Transaction;
         $transaction->user_id=Auth::user()->id;
         $transaction->amount=$request['sum'];
         $transaction->description="withdrawn from ". $plan->plane_name; 
         $transaction->save();

            return view("pages.withdraw",['success'=>'withdrawal successful!','plan'=>$plan]);



        }
    }

}











