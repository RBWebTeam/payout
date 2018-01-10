<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Session;
use URL;
use Mail;
use DB;

class LoginController extends CallApiController
{
    public function login(){
      if(Session::get('userid')){
        return redirect('dashboard');
      }
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
            $this::set_session_for_user($value->id,$value->name,$value->email,$value->role_id,$value->product_type_id);
          }else{
            $agent_from_api=$this::call_agent_api($request);
            $this::set_session_for_user(15,$agent_from_api->Fullname,$agent_from_api->UserName,5,1);
            return redirect('dashboard');
          }
          	if($value){ 
                return redirect('dashboard');

                }else{
               	 Session::flash('msg', "Invalid email or password. Please Try again! ");
                 return Redirect::back();
                }
      }
    }

    public function logout(){
      Session::flush();
      return Redirect('/');

    }
    public function call_agent_api($req){
      $email="rajeev.ranjan9@rupeeboss.com";
      $password="4mxQl4U4Kl+iOEkKNxTw1w==";
      $data='{"UserName": "'.$email.'","Password": "'.$password.'"}';
      $url="http://apiservices.magicfinmart.com/api/Login/ProcessLogin";
      $result=$this::call_json_data_api($url,$data);
      $http_result=json_decode($result['http_result'])[0];

      return $http_result;


    }
    public function set_session_for_user($id,$name,$email,$role_id,$product_type_id){
        Session::put('userid',$id);
        Session::put('name',$name);
        Session::put('email',$email);
        Session::put('role_id',$role_id);
        Session::put('product_type_id',$product_type_id);
    }
}
