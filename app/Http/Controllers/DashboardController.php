<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Session;
use URL;
use Mail;
use DB;


class DashboardController extends Controller
{
    public function dashboard(Request $req){
     $role_id=Session::get('role_id');

     $piechart= DB::select('call usp_rolewise_status_count(?)', array($role_id));
     
     return ($piechart);
    
    }
}
