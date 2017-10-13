  @extends('includes.master')
  @section('content')    
 <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="font-size: 30px">Edit Product</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" method="post" action="{{url('product-types-edit-submit')}}">
                    {{ csrf_field() }}

                     <input type="hidden" name="product_id" id="product_id" value="{{$query->id}}">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="productname">Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="productname" id="productname" required="required" value="{{$query->name}}" class="form-control col-md-7 col-xs-12">
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