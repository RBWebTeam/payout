  @extends('includes.master')
  @section('content')    




 <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 <h1>Statistics</h1>
                  <div class="x_content">

                   @if(Session::get('role_id')==1)
                   <div id="chartdiv" style="width: 100%; height: 500px;"></div>
                   @elseif(Session::get('role_id')==2)
                   <div id="chartdiv" style="width: 100%; height: 500px;"></div>
                   @elseif(Session::get('role_id')==3)
                   <div id="chartdiv" style="width: 100%; height: 500px;"></div>
                   @elseif(Session::get('role_id')==4)
                   <div id="chartdiv" style="width: 100%; height: 500px;"></div>
                   @elseif(Session::get('role_id')==5)
                   <div id="chartdiv" style="width: 100%; height: 500px;"></div>
                   
                 
                   @endif


                   


                  </div>
                </div>
              </div>
            </div>
          </div>

        <!-- /page content -->
 @endsection
 

  



                      
 