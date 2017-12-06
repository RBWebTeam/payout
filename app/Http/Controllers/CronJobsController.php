<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class CronJobsController extends Controller
{
	public function loanData(Request $req){
		$data=json_encode($req->all());        
		$url="http://beta.services.rupeeboss.com/LoginDtls.svc/xmlservice/dsplyApplndisbursalData";
		$result=$this::call_json_data_api($url,$data);

		if($result['http_result']){
			$d=json_decode($result['http_result'])->result;
			//print_r($d);
			foreach ($d as $key => $value) {
				# code...
				foreach ($value as $k => $val) {
					# code...
				$val->transaction_date=date_format( new \DateTime($val->transaction_date),'Y-m-d H:i:s');
				$val->disbursal_date=date_format( new \DateTime($val->disbursal_date),'Y-m-d H:i:s');   
				//print_r($val);exit();
				$exec=DB::statement('CALL usp_insert_payout_data(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$val->area,$val->bank_nbfc ,$val->business_mode ,$val->class_of_business ,$val->client_name ,$val->disbursal_data ,$val->disbursal_date ,$val->disbursal_for_payout ,$val->dsa_code ,$val->fba_code ,$val->fba_name,$val->loan_no ,$val->location ,$val->payee_account_ifsc ,$val->payee_account_no  ,$val->payee_name ,$val->process ,$val->region ,$val->sm_code ,$val->sm_name ,$val->transaction_date ,"Home Loan" ,$val->type_of_entry]);
				}
				
			}
		}
		
	}

	public function policyData(Request $req){
		$from=$req['from_date'];
		$to=$req['to_date'];
		//print_r($req->all()); exit();      
		$url="http://202.131.96.100:7755/Service1.svc/PaymentDetails?FromDate=".$from."&ToDate=".$to;
		$result=$this::call_json_data_get_api($url);
		//If no data Fetched exit
		if(! $result)exit();
		//else go on
		$data=json_decode( $result['http_result']);

		try {
			foreach ($data->PaymentDetailsResult as $key => $value) {
				# code...
				$value->PolicyDate=date_format( new \DateTime($value->PolicyDate),'Y-m-d H:i:s');   
		 		$value->PaymentDate=date_format(new \DateTime($value->PaymentDate),'Y-m-d H:i:s');  
				$exc=DB::select('call usp_insert_insurance_data(?,?,?,?,?,?,?,?,?,?,?,?,?)',[$value->CustomerName,$value->Email,$value->EntryNo,$value->Mobile,$value->NetPayOutAmt,$value->PayOutAmt,$value->PaymentDate,$value->PolicyAmt,$value->PolicyDate,$value->PolicyID,$value->ProductId,$value->VendorID,$value->VendorName]);
			}
		} catch (\Exception $e) {
			print_r($e->getMessage());
		}
			
		
		
	}
	public function call_json_data_api($url,$data){
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        $http_result = curl_exec($ch);
        $error = curl_error($ch);
        $http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
        curl_close($ch);
          $result=array('http_result' =>$http_result ,'error'=>$error );

		return ($result);

		
	}
	public function call_json_data_get_api($url){
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $http_result = curl_exec($ch);
        $error = curl_error($ch);
        $http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
        curl_close($ch);
         $result=array('http_result' =>$http_result ,'error'=>$error );

		return $result;
	}
}