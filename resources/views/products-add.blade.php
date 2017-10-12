  @extends('includes.master')
  @section('content')   

  
 <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="font-size: 30px">Add Product</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_type">Product Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control block drop-arr select-sty" name="product_type" id="product_type"  required>
                                <option disabled selected  value="">Product Type</option>
                                            <option value="1">Insurance</option>
                                            <option value="2">Loan</option>
                                            <option value="3">MutualFund</option>
                                            <option value="4">Card</option>
                                            <option value="5">HealthPackage</option>
                                            <option value="6">Others</option>
                                                  
                          </select> 
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="commission_mode" class="control-label col-md-3 col-sm-3 col-xs-12">Commission Mode<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="commission_mode" class="form-control col-md-7 col-xs-12"  type="text" name="commission_mode">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="commission_percentage" class="control-label col-md-3 col-sm-3 col-xs-12">Commission Percentage<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="commission_percentage" class="form-control col-md-7 col-xs-12" type="text" onkeypress="return fnAllowNumeric(event)" name="commission_percentage">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <a class="btn btn-success" id="payout_submit">Submit</a>
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

 <script type="text/javascript">
   function fnAllowNumeric(e)
{
if ((event.keyCode < 48 || event.keyCode > 57) &&(event.keyCode < 35 || event.keyCode > 40) && event.keyCode != 8 && event.keyCode != 46 && event.keyCode != 16 && event.keyCode != 9 && event.keyCode != 45)
{
event.keyCode = 0;
return false;
}
return true;
}
 </script>

 <script type="text/javascript">
   $('#payout_submit').click(function(){
    alert('okae');
   });
 </script>