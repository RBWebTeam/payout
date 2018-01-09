<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class CronJobsController extends Controller
{
	public function loanData(Request $req){
		date_default_timezone_set('Asia/Kolkata');
		$make_data = array('ToDate' => date("Y-m-d"),'FromDate'=>date("Y-m-d",strtotime("-1 days")),'ProductCategory'=>"Loan");
		$data=json_encode($make_data);        
		$url="http://beta.services.rupeeboss.com/LoginDtls.svc/xmlservice/dsplyApplndisbursalData";
		$result=$this::call_json_data_api($url,$data,"");
		$data_decoded=json_decode($result['http_result']);
		if(!$data_decoded->statusId){
			$d=json_decode($result['http_result'])->result;
			foreach ($d as $key => $value) {
				foreach ($value as $k => $val) {
				$val->transaction_date=date_format( new \DateTime($val->transaction_date),'Y-m-d H:i:s');
				$val->disbursal_date=date_format( new \DateTime($val->disbursal_date),'Y-m-d H:i:s');
				$exec=DB::statement('CALL usp_insert_payout_data(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$val->area,$val->bank_nbfc ,$val->business_mode ,$val->class_of_business ,$val->client_name ,$val->disbursal_data ,$val->disbursal_date ,$val->disbursal_for_payout ,$val->dsa_code ,$val->fba_code ,$val->fba_name,$val->loan_no ,$val->location ,$val->payee_account_ifsc ,$val->payee_account_no  ,$val->payee_name ,$val->process ,$val->region ,$val->sm_code ,$val->sm_name ,$val->transaction_date ,"Home Loan" ,$val->type_of_entry]);
				}
				
			}
		}
		else{
			throw new \Exception($data_decoded->message." for ".$data, 1);
		}
		
	}

	public function policyData(Request $req){
		
		$to=date("d-M-Y");
		$from=date("d-M-Y",strtotime("-1 days"));  
		$url="http://202.131.96.100:7755/Service1.svc/PaymentDetails?FromDate=".$from."&ToDate=".$to;
		$result=$this::call_json_data_get_api($url);

		if(! $result)throw new \Exception("No data Found", 1);
		;

		$data=json_decode( $result['http_result']);
		//print_r($data);exit();
		if($data->PaymentDetailsResult)		
			{
				foreach ($data->PaymentDetailsResult as $key => $value) {
							# code...
							$value->PolicyDate=date_format( new \DateTime($value->PolicyDate),'Y-m-d H:i:s');   
					 		$value->PaymentDate=date_format(new \DateTime($value->PaymentDate),'Y-m-d H:i:s');  
					 		
								// print_r('call usp_insert_insurance_data('.$value->CustomerName.','.$value->Email.','.$value->EntryNo.','.$value->Mobile.','.$value->NetPayOutAmt.','.$value->PayOutAmt.','.$value->PaymentDate.','.$value->PolicyAmt.','.$value->PolicyDate.','.$value->PolicyID.','.$value->ProductId.','.$value->VendorID.','.$value->VendorName.')');exit();
							 $exc=DB::select('call usp_insert_insurance_data(?,?,?,?,?,?,?,?,?,?,?,?,?)',[$value->CustomerName,$value->Email,$value->EntryNo,$value->Mobile,$value->NetPayOutAmt,$value->PayOutAmt,$value->PaymentDate,$value->PolicyAmt,$value->PolicyDate,$value->PolicyID,$value->ProductId,$value->VendorID,$value->VendorName]);
							 $this::update_bank_info($value->VendorID);

						}
					}else{
						throw new \Exception("No data Found from ".$from." to ".$to, 1);
						
					}
		
			
		
		
	}

	public function update_bank_info($vendor_id){
		try{$get_bank_info='{"Vendor_Id":"'.$vendor_id.'"}';
				$header_for_bank=["UserName:test","Password:test@123"];
				$bank_info=$this::call_json_data_api("http://vehicleinfo.policyboss.com/api/POSPBankInfo",$get_bank_info,$header_for_bank);
				$data=json_decode($bank_info['http_result']);
				if(!$bank_info['error'] || $data->ErrorResponse=="Success"){
					//print_r($data);exit();
					$exc=DB::select("call usp_update_bank_info(?,?,?,?,?)",[$data->Name_as_in_Bank,$data->Email_ID,$data->Bank_Account_No,$data->IFSC_Code,$vendor_id]);
				}
			}catch(\Exception $ee){
				throw new \Exception("bank data can not be updated:\n".$ee->getMessage(), 1);
				
			}
	}
	public function call_json_data_api($url,$data,$header){


		$ch = curl_init();
		if($header){
			array_push($header, 'Content-Type:application/json');
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		}else{
			curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));	
		}
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
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