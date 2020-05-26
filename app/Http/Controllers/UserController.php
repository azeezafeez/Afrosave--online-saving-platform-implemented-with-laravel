<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use App\Plan;
class UserController extends Controller
{
    public function reg(){
        return view("auth.registration");
    }

    public function log(){
        return view("auth.signin");
    }

    public function signup(Request $request){
        
        $this->validate($request,[
    		'email'=> 'required|email|unique:users',
            'first_name' => 'required|max:120',
            'last_name' => 'required|max:120',
            'phone_number' => 'required|max:12',
    		'password' => 'required|min:4|max:12'
    	]);
    	$email=$request['email'];
        $first_name=$request['first_name'];
        $last_name=$request['last_name'];
        $phone_number=$request['phone_number'];
    	$password=bcrypt($request['password']);

    	$user= new User;
    	$user->email=$email;
    	$user->password=$password;
        $user->firstname=$first_name;
        $user->lastname=$last_name;
        $user->phone_number=$phone_number;
    	$user->save();
    	Auth::login($user);
    	return redirect()->route('homes');
    }

    public function signin(Request $request){
        $this->validate($request,[
    		'email'=> 'required',
    		'password' => 'required'
    	]);
    	if(Auth::attempt(['email'=> $request['email'], 'password' => $request['password']])){
    			return redirect()->route('homes');
		}
    	return view("auth.signin",['message'=>'Incorrect username or password']);
    }



    public function home(){
        $this->middleware('auth');
        $plans= Auth::user()->plans()->get();
         $balance= Plan::where('user_id','=',Auth::user()->id)->get()->sum('balance');
        return view('pages.dashboard',['plans'=>$plans, 'balance'=>$balance]);
    }

    public function logoff(){
        Auth::logout();
        return redirect()->route('log');
    }
}
