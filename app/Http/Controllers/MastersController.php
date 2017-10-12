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


    public function view($id){
        $query = DB::table('products')->select('id', 'name', 'product_type_id', 'commission_mode','commission_percentage')->where('id','=',$id)->get();
     return view('products-view',['query'=>$query]);
    }


    public function edit($id){
         $query = DB::table('products')->select('id', 'name', 'product_type_id', 'commission_mode','commission_percentage')->where('id','=',$id)->first();
     return view('products-edit',['query'=>$query]);
    }
    


    public function delete($id){
    
         DB::table('products')->where('id', '=', $id)->delete();
     return  redirect('products');
    }

    public function add(){
    return view('products-add');
   }

    public function products_add_submit(Request $req){
        // print_r($req->all());exit();
    $query=DB::table('products')
    ->insert(['product_name'=>$req->name,
           'product_type_id'=>$req->product_type,
           'commission_mode'=>$req->commission_mode,
           'commission_percentage'=>$req->commission_percentage
           ]);
       
    }
   
     


}
