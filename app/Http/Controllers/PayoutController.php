<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PayoutController extends Controller
{
	public function pending_payout(){
		$data=DB::table('sales')->select('name', 'fba_code', 'fba_name', 'sm_code', 'sm_name', 'posp_code', 'dsa_code', 'product_id', 'status_id', 'log_id', 'sync_id', 'create_date', 'modify_date', 'report_month', 'report_date', 'crn_code', 'region', 'area', 'location', 'business_mode', 'type_of_entry', 'cover_note_no', 'inception_date', 'transaction_date', 'disbursal_date', 'disbursal_data', 'policy_code', 'loan_no', 'bank_nbfc', 'client_name', 'class_of_business', 'type_of_business', 'policy_no', 'vehicle', 'insurance_company', 'tariff', 'discount', 'gross_premium', 'premium_for_payout', 'disbursal_for_payout', 'payout', 'gross_payable', 'less_tds', 'net_payable_after_tds', 'final_commision_payable', 'payment_in_favour')
			->where('ops_validated_on','=',NULL)->get();
			
			return view('pending-page')->with(["payout_data"=>$data]);
	}
}