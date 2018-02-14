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
		try{
			$data=DB::select('Call usp_update_sales(?,?,?,?)',[$sales_id,$status_id,$user_id,$remark]);
			Session::flash('msg', "lead Status update Successfully");
		}catch(\Exception $ee){
			Session::flash('msg', "Error:lead Status update Failed");
		}
		return redirect('dashboard');
		
	}
	public function get_payout_data($status){
		// print_r($status);exit();
		
		$user_id=Session::get('userid');
		// print_r($user_id);exit();
		$role_id=Session::get('role_id');
		$fba_id=Session::get('fba_id');
		$email=Session::get('email');
		$status_id=Session::get('status_id');
		// print_r($status_id);exit();
		$data=DB::select('Call usp_statuswise_sales(?,?,?,?)',[$user_id,$status,$fba_id,$email]);
		// print_r($data);exit();
		$status=DB::select('Call usp_load_rolewise_statuses(?)',[$role_id]);

		return view('pending-page')->with(["payout_data"=>$data,"status"=>$status]);
		
	}

	public function excel_upload_submit(Request $req){
      // if(!$req['file'])return "No Such File";
      $data = \Excel::load($req['file'])->toObject();
       
      // print_r($data);exit();
       foreach ($data as $key => $value) {
       //foreach ($value as $k => $val) {
      
        if($value->id!=null ||$value->utr_no!=null || $value->amount_paid!=null || $value->processed_by!=null || $value->processed_on!=null || $value->remark!=null){
        	$this->insertexcel($value->id,$value->utr_no,$value->amount_paid,$value->processed_by,$value->processed_on,$value->remark); 
    }
     }
        return redirect('dashboard');
	}


	public function insertexcel($id,$utr_no,$amount_paid,$processed_by,$processed_on,$remark){
                         

         $query=DB::table('sales')->where('id','=', $id)->update(
         	['utr_no' =>$utr_no,
           'amount_paid'=> $amount_paid,
           'processed_by'=>$processed_by,
           'processed_on'=>$processed_on,
           'remark'=>$remark
           ]);

         
         
         
         
    }

	public function tableexcel(){
		echo "Heloo wWorld";
		return view('tableexcel');
	}
}