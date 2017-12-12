  @extends('includes.master')
  @section('content')    
 <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
               
                  <div class="x_title">
                    <h2 style="font-size: 30px">Edit User</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" method="POST" action="{{url('user-edit-submit')}}">

                    {{ csrf_field() }}
                      <input type="hidden" name="user_id" id="user_id" value="{{$query->id}}">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="username" id="username" required="required" value="{{$query->name}}"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Mobile <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="mobile" id="mobile" required="required" value="{{$query->mobile}}"  class="form-control col-md-7 col-xs-12" maxlength="10">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="email" id="email" oninput="mail('email')"  required="required" value="{{$query->email}}"  class="form-control col-md-7 col-xs-12">
                            <div id="e_mail" style="display:none;color: red;">Please Enter Valid Email Id.</div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="password" id="password" required="required" value="{{$query->password}}"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_id">Role<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control block drop-arr select-sty" name="role_id" id="role_id"  required>
                                             <option value="1" >Admin</option>
                                             <option value="2">Operation</option>
                                             <option value="3">Vertical Head</option>
                                             <option value="4">Finance</option>
                                             <option value="5">Agent</option>
                                            
                        </select> 
                        </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_type_id">Product Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control block drop-arr select-sty" name="product_type_id" id="product_type_id"  required>
                                             <option value="1" >Insurance</option>
                                             <option value="2">Loan</option>
                                             <option value="3">MutualFund</option>
                                             <option value="4">Card</option>
                                             <option value="5">HealthPackage</option>
                                             <option value="6">Others</option>
                        </select> 
                        </div>
                         </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="create_date">Create Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="create_date" id="create_date" required="required" value="{{$query->create_date}}" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="modify_date">Create Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="modify_date" id="modify_date" required="required" value="{{$query->modify_date}}" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="active">Active<span class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control block drop-arr select-sty" name="active" id="active" required>
                                             <option value="Y">Yes</option>
                                             <option value="N">No</option>
                        </select>
                        </div>
                      </div>
                      
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <!-- /page content -->
 @endsection

 