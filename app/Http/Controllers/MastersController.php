<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MastersController extends Controller
{
    public function products(){
     
     $query = DB::table('products')->select('id', 'name', 'product_type_id', 'commission_mode','commission_percentage')->get();
     return view('products',['query'=>$query]);
    	
    }

    public function product_types(){
     
     $query = DB::table('product_types')->select('id', 'name')->get();
     return view('product_types',['query'=>$query]);
    	
    }

     public function Statuses(){
     
     $query = DB::table('statuses')->select('id', 'name','active','sequence')->get();
     return view('statuses',['query'=>$query]);
    	
    }

     public function role(){
     
     $query = DB::table('roles')->select('id', 'name','active')->get();
     return view('role',['query'=>$query]);
    	
    }

    public function user(){
     
     // $query = DB::table('users')->select('id', 'name','mobile','email','password','role_id','product_type_id','create_date','modify_date','active')->innerjoin('role', 'users.id', '=', 'orders.user_id')->g


$users = DB::table('users')
            ->join('roles', 'users.id', '=', 'roles.id')
            ->join('product_types', 'users.id', '=', 'product_types.id')
            ->select('users.*', 'roles.*','product_types.*')
            ->get();


     return view('user',['query'=>$users]);
    	
    }

    
}
