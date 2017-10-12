<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class PayoutController extends Controller
{
	public function pending_payout(){
		$user_id=Session::get('userid');
		$status=1;
		$data=DB::select('Call usp_statuswise_sales(?,?)',[$user_id,$status]);
		//print_r($data);exit();
			return view('pending-page')->with(["payout_data"=>$data]);
	}
	public function update_payout(Request $req){
		print_r($req->all());
	}
}