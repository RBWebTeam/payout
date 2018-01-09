  @extends('includes.master')
  @section('content')  
  <style type="text/css">
  
.scrollit {
    overflow:scroll;
    height:500px;
}
  </style>
 <div class="right_col" role="main">
            <div class="row"  class="right_col"">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
              
                  <div class="x_content" style="overflow-x:auto;">
                    <p class="text-muted font-13 m-b-30">
                   <b style="font-size: 30px">Product Type</b>
                    </p>
                    <div class="scrollit" id="dvData">
                    <table id="" class="table table-striped table-bordered table-responsive">
                      <thead>
                        <tr>
                          <th>name</th>
                          <th>fba_code</th>
                          <th>fba_name</th>
                          <th>sm_code</th>
                          <th>sm_name</th>
                          <th>posp_code</th>
                          <th>dsa_code</th>
                          <th>product</th>
                          <th>status</th>
                          <th>create_date</th>
                          <th>modify_date</th>
                          <th>report_month</th>
                          <th>report_date</th>
                          <th>crn_code</th>
                          <th>region</th>
                          <th>area</th>
                          <th>location</th>
                          <th>business_mode</th>
                          <th>type_of_entry</th>
                          <th>cover_note_no</th>
                          <th>inception_date</th>
                          <th>transaction_date</th>
                          <th>disbursal_date</th>
                          <th>disbursal_data</th>
                          <th>policy_code</th>
                          <th>loan_no</th>
                          <th>bank_nbfc</th>
                          <th>client_name</th>
                          <th>class_of_business</th>
                          <th>type_of_business</th>
                          <th>policy_no</th>
                          <th>vehicle</th>
                          <th>insurance_company</th>
                          <th>tariff</th>
                          <th>discount</th>
                          <th>gross_premium</th>
                          <th>premium_for_payout</th>
                          <th>payout</th>
                          <th>gross_payable</th>
                          <th>less_tds</th>
                          <th>net_payable_after_tds</th>
                          <th>final_commision_payable</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                      	@foreach($payout_data as $value)
                        <tr>
                        <td>{{$value->name}}</td>
							<td>{{$value->fba_code}}</td>
							<td>{{$value->fba_name}}</td>
							<td>{{$value->sm_code}}</td>
							<td>{{$value->sm_name}}</td>
							<td>{{$value->posp_code}}</td>
							<td>{{$value->dsa_code}}</td>
							<td>{{$value->productname}}</td>
							<td>{{$value->statusname}}</td>
							<td>{{$value->create_date}}</td>
							<td>{{$value->modify_date}}</td>
							<td>{{$value->report_month}}</td>
							<td>{{$value->report_date}}</td>
							<td>{{$value->crn_code}}</td>
							<td>{{$value->region}}</td>
							<td>{{$value->area}}</td>
							<td>{{$value->location}}</td>
							<td>{{$value->business_mode}}</td>
							<td>{{$value->type_of_entry}}</td>
							<td>{{$value->cover_note_no}}</td>
							<td>{{$value->inception_date}}</td>
							<td>{{$value->transaction_date}}</td>
							<td>{{$value->disbursal_date}}</td>
							<td>{{$value->disbursal_data}}</td>
							<td>{{$value->policy_code}}</td>
							<td>{{$value->loan_no}}</td>
							<td>{{$value->bank_nbfc}}</td>
							<td>{{$value->client_name}}</td>
							<td>{{$value->class_of_business}}</td>
							<td>{{$value->type_of_business}}</td>
							<td>{{$value->policy_no}}</td>
							<td>{{$value->vehicle}}</td>
							<td>{{$value->insurance_company}}</td>
							<td>{{$value->tariff}}</td>
							<td>{{$value->discount}}</td>
							<td>{{$value->gross_premium}}</td>
							<td>{{$value->premium_for_payout}}</td>
							<td>{{$value->payout}}</td>
							<td>{{$value->gross_payable}}</td>
							<td>{{$value->less_tds}}</td>
							<td>{{$value->net_payable_after_tds}}</td>
							<td>{{$value->final_commision_payable}}</td>
							<td ><a   class="btn btn-info btn-lg update_status" data-toggle="modal" data-target="#approve_modal" data-val="{{$value->id}}">
									Proceed</a>
							</td>
							</tr>
              @endforeach
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
<!-- Modal -->
  <div class="modal fade" id="approve_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Status</h4>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{URL::to('update-payout')}}" id="update_status_form">	
        <input type="hidden" name="sale_id" id="modal_saleid">
        {{csrf_field()}}	 
			    <div class="form-group col-md-4">
			      <label for="modal_status" class="col-form-label">State</label>
			      <select id="modal_status" class="form-control" name="status_id" required>
			      <option disabled="" selected="">Select Status</option>
		          	@foreach($status as $val)
		          	<option value="{{$val->id}}">{{$val->statusname}}</option>

		          	@endforeach
		          	</select>
		          	 
			  </div>
			  <div class="form-group col-md-6">
			  <label for="inputZip" class="col-form-label">Remark</label>
		  	<input type="textarea" class="form-control" id="modal_remark" name="modal_remark" required>
			  </div>
			  <div class="form-group col-md-8">
			  <button type="submit" class="btn btn-primary">Submit</button>
			  </div>
			  </form>
			  </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
        </div>
        @endsection
   

   