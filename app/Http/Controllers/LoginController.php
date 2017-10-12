<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Session;
use URL;
use Mail;
use DB;

class LoginController extends Controller
{
    public function login(){

    	return view('login');
    }

    public function login_page(Request $request){

 

    		$validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }else{
           $value=DB::table('users')
           ->select('users.*')
           ->where('email','=',$request->email)
          ->where('password','=', $request->password)
          //->where('user_type_id','!=','0')
          ->first();
          	if($value){ 
                  $request->session()->put('userid',$value->id);
		          	  $request->session()->put('name',$value->name);
		          	  $request->session()->put('email',$value->email);
		              $request->session()->put('role_id',$value->role_id);
                  $request->session()->put('product_type_id',$value->product_type_id);

                     return redirect('dashboard');

                }else{
               	 Session::flash('msg', "Invalid email or password. Please Try again! ");
                 return Redirect::back();
                }
      }
    }
}
