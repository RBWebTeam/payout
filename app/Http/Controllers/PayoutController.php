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
		
		$user_id=Session::get('userid');
		$role_id=Session::get('role_id');
		$data=DB::select('Call usp_statuswise_sales(?,?)',[$user_id,$status]);
		// print_r($data);exit();
		$status=DB::select('Call usp_load_rolewise_statuses(?)',[$role_id]);

		return view('pending-page')->with(["payout_data"=>$data,"status"=>$status]);
		
	}

	public function excel_upload_submit(Request $req){
    
      $data = \Excel::load($req['file'])->toObject();
       //print_r($data);exit();
       foreach ($data as $key => $value) {
       foreach ($value as $k => $val) {

      if(isset($val->employername)){
      	$this->insertexcel($val->employername,$val->final_category); 
      }elseif (isset($val->hospital_name)) {
      	$this->insertexcel($val->hospital_name,$val->category);
      }elseif (isset($val->name)) {
      	$this->insertexcel($val->name,$val->category);
    }
  
    
        
      }
    

     }
	}
}