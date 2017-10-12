<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class PayoutController extends Controller
{
	public function pending_payout($id){
		
		return PayoutController::get_payout_data($id);
		//1 for operation verified sales only
	}
	public function update_payout(Request $req){
		
		$user_id=Session::get('userid');
		$status_id=$req['status_id'];
		$sales_id=$req['sale_id'];
		$remark=$req['modal_remark'];
		$data=DB::select('Call usp_update_sales(?,?,?,?)',[$sales_id,$status_id,$user_id,$remark]);

	}
	public function get_payout_data($status){
		
		$user_id=Session::get('userid');
		$role_id=Session::get('role_id');
		$data=DB::select('Call usp_statuswise_sales(?,?)',[$user_id,$status]);
		$status=DB::select('Call usp_load_rolewise_statuses(?)',[$role_id]);
		return view('pending-page')->with(["payout_data"=>$data,"status"=>$status]);
		
	}
}