<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
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

    public function products_edit_submit(Request $req){
        $query= DB::update('call usp_products ("'.$req['product_id'].'","'.$req['productname'].'","'.$req['product_type_id'].'","'.$req['commission_mode'].'","'.$req['commission_percentage'].'","update")');
          Session::flash('msg', "Updated Successfully.....");
          return  redirect('products');
    }
    


    public function delete($id){
    
     //     DB::table('products')->where('id', '=', $id)->delete();
     // return  redirect('products');
        $query= DB::delete('call usp_products ("'.$id.'",NULL,NULL,NULL,NULL,"delete")');
         Session::flash('msg', "Deleted Successfully.....");
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

    /*Product Type*/


    public function product_types_view($id){
        $query = DB::table('product_types')->select('id', 'name')->where('id','=',$id)->get();
     return view('product_types-view',['query'=>$query]);
        
    }

    public function product_types_edit($id){ 
    $query = DB::table('product_types')->select('id', 'name')->where('id','=',$id)->first();
     return view('products_types-edit',['query'=>$query]);
    }


    public function product_types_edit_submit(Request $req){
        // print_r($req->all());exit();
        $query= DB::update('call usp_product_type ("'.$req['product_id'].'","'.$req['productname'].'","update")');
        Session::flash('msg', "Updated Successfully.....");
        return  redirect('product_types');
    }

     public function product_type_delete($id){
      // DB::table('products')->where('id', '=', $id)->delete();
     // return  redirect('products');
        $query= DB::delete('call usp_product_type ("'.$id.'",NULL,"delete")');
        Session::flash('msg', "Deleted Successfully.....");
        return  redirect('product_types');
    }

    /*Status*/

    public function status_view($id){
     $query = DB::table('statuses')->select('id', 'name','active','sequence')->where('id','=',$id)->get();
     return view('status-view',['query'=>$query]);
        
    }

    public function status_edit($id){
     $query = DB::table('statuses')->select('id', 'name', 'active', 'sequence')->where('id','=',$id)->first(); 
        return view('status-edit',['query'=>$query]);
    }
    
    public function status_edit_submit(Request $req){



       $query= DB::update('call usp_statuses ("'.$req['status_id'].'","'.$req['statusname'].'","'.$req['active'].'","'.$req['sequence'].'","update")');
         Session::flash('msg', "Updated Successfully");
        return  redirect('statuses');
   }

    public function status_delete($id){
      // DB::table('products')->where('id', '=', $id)->delete();
     // return  redirect('products');
        $query= DB::delete('call usp_statuses ("'.$id.'",NULL,NULL,NULL,"delete")');
        Session::flash('msg', "Deleted Successfully.....");
        return  redirect('statuses');
    }

    /*Role*/
     
    public function role_view($id){
    $query = DB::table('roles')->select('id', 'name','active')->where('id','=',$id)->get();
     return view('role-view',['query'=>$query]);
    }

    public function role_edit($id){
        $query = DB::table('roles')->select('id', 'name', 'active')->where('id','=',$id)->first(); 
        return view('role-edit',['query'=>$query]);
    }

    public function role_edit_submit(Request $req){
      $query= DB::update('call usp_roles ("'.$req['role_id'].'","'.$req['rolename'].'","'.$req['active'].'","update")');
         Session::flash('msg', "Updated Successfully");
        return  redirect('role');
   }

   public function role_delete($id){
      // DB::table('products')->where('id', '=', $id)->delete();
     // return  redirect('products');
        $query= DB::delete('call usp_roles ("'.$id.'",NULL,NULL,"delete")');
        Session::flash('msg', "Deleted Successfully");
        return  redirect('role');
    }

    /*Users*/
    public function users_view($id){
    $query = DB::table('users')->select('id', 'name','mobile','email','password','role_id','create_date','modify_date','active')->where('id','=',$id)->get();
     return view('user-view',['query'=>$query]);
    }
    

}
