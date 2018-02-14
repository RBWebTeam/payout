@extends('includes.master')
@section('content')
<!-- <script src="{{URL::to('js/jquery.table2excel.min.js')}}" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>

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

                               @if(Session::get('role_id')!=5)
                                <button id="exportexcel" onclick="exportexcel()">Export to Excel</button>  
                                <form class="" id="document_upload_form" action="{{URL::to('excel-upload-submit')}}" role="form" method="POST" enctype="multipart/form-data">
                                      {{ csrf_field() }}
                                      <input type="file" name="file"><br>
                                      @if(Session::get('role_id')!=2 && Session::get('role_id')!=3)
                                      <input type="submit" name="submit">  
                                      @endif 
                             </form><br>
                             @endif




                       <div class="scrollit" id="product_related">    

                    <table id="" class="table table-striped table-bordered table-responsive">
                      <thead>

                        <tr>@if(Session::get('role_id')!=2 && Session::get('role_id')!=3 && Session::get('role_id')!=5)
                          <th>id</th>
                          @endif
                          <th>name</th>
                          <th>fba_code</th>
                          <th>fba_name</th>
                          <th>product</th>
                          @if(Session::get('role_id')!=2 && Session::get('role_id')!=3 && Session::get('role_id')!=5)
                          <th>status</th>
                          <th>create_date</th>
                          <th>modify_date</th>
                          <th>type_of_entry</th>
                          @endif
                          <th>business_mode</th>
                          <th>inception_date</th>
                          <th>disbursal_date</th>
                          @if(Session::get('role_id')!=2 && Session::get('role_id')!=3 && Session::get('role_id')!=5)
                          <th>entryno</th>
                          <th>policydate</th>
                          @endif
                          <th>client_name</th>
                          <th>class_of_business</th>
                          <th>type_of_business</th>
                          <th>policy_no</th>
                          <th>premium_for_payout</th>
                          <th>payout</th>
                          <th>gross_payable</th>
                          <th>less_tds</th>
                          <th>net_payable_after_tds</th>
                          
                          <th>utr_no</th>
                          <th>amount_paid</th>
                          @if(Session::get('role_id')!=2 && Session::get('role_id')!=3 && Session::get('role_id')!=5)
                          <th>processed_by</th>
                          @endif
                          <th>processed_on</th>
                          
                          <th>remark</th>
                          @if(Session::get('role_id')!=5)
                          <th>Action</th>
                          @endif
                        </tr>
                        <thead>
                          
                          <tbody>
                         @foreach($payout_data as $value)
                        <tr>@if(Session::get('role_id')!=2 && Session::get('role_id')!=3 && Session::get('role_id')!=5)
                        <td>{{$value->id}}</td>
                        @endif
                        <td>{{$value->name}}</td>
							<td>{{$value->fba_code}}</td>
							<td>{{$value->fba_name}}</td>
					    <td>{{$value->productname}}</td>
               @if(Session::get('role_id')!=2 && Session::get('role_id')!=3 && Session::get('role_id')!=5)
							<td>{{$value->statusname}}</td>
							<td>{{$value->create_date}}</td>
							<td>{{$value->modify_date}}</td>
              <td>{{$value->type_of_entry}}</td>
              @endif
							<td>{{$value->business_mode}}</td>
							<td>{{$value->inception_date}}</td>
              <td>{{$value->disbursal_date}}</td>
              @if(Session::get('role_id')!=2 && Session::get('role_id')!=3 && Session::get('role_id')!=5)
              <td>{{$value->entryno}}</td>
              <td>{{$value->policydate}}</td>
              @endif
              <td>{{$value->client_name}}</td>
							<td>{{$value->class_of_business}}</td>
							<td>{{$value->type_of_business}}</td>
							<td>{{$value->policy_no}}`</td>
							<td>{{$value->premium_for_payout}}</td>
							<td>{{$value->payout}}</td>
							<td>{{$value->gross_payable}}</td>
							<td>{{$value->less_tds}}</td>
							<td>{{$value->net_payable_after_tds}}</td>
							
              <td>{{$value->utr_no}}</td>
              <td>{{$value->amount_paid}}</td>
              @if(Session::get('role_id')!=2 && Session::get('role_id')!=3 && Session::get('role_id')!=5)
              <td>{{$value->processed_by}}</td>
              @endif
              <td>{{$value->processed_on}}</td>
              
              
              <td>{{$value->remark}}</td>
            @if(Session::get('role_id')!=5)
							<td >
 
              <a   class="btn btn-info btn-lg update_status" data-toggle="modal" data-target="#approve_modal" data-val="{{$value->id}}">
									Proceed</a>
                  
							</td>
              @endif

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


<script type="text/javascript">
function exportexcel() {  

            $("#product_related").table2excel({  
                name: "Table2Excel",  
                filename: "myFileName.xls",  
                fileext: ".xls"  
            });  
        }  
</script>






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




