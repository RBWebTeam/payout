<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>@if(session()->has('email')) {{Session::get('name')}} @endif</span></a>
            </div>

      

            <!-- sidebar menu -->

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
               
                <ul class="nav side-menu">
                @if(Session::get('role_id')==1)
                  <li><a><i class="fa fa-home"></i>Admin<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::to('products')}}">Product</a></li>
                      <li><a href="{{URL::to('product_types')}}">Product Type</a></li>
                      <li><a href="{{URL::to('statuses')}}">Status</a></li>
                       <li><a href="{{URL::to('role')}}">Role</a></li>
                       <li><a href="{{URL::to('user')}}">User</a></li>
                    </ul>
                  </li>
                @elseif (Session::get('role_id')==2)
                     <li><a><i class="fa fa-home"></i>Operation<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::to('pending-page/1')}}">Operation-Pending</a></li>
                      <li><a href="{{URL::to('pending-page/2')}}"">Operation-Sale-Verified</a></li>
                      <li><a href="{{URL::to('pending-page/3')}}"">Operation-Sale-Decline</a></li>
                      <li><a href="{{URL::to('pending-page/4')}}">Vertical-Commission-Declined</a></li>
                      
                    </ul>
                  </li>
                @elseif (Session::get('role_id')==3)
                <li><a><i class="fa fa-home"></i>Vertical Head<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="{{URL::to('pending-page/5')}}">Vertical-Commission-Verified</a></li>
                      <li><a href="{{URL::to('pending-page/6')}}">Vertical-Commission-Declined</a></li>
                     
                    </ul>
                  </li>

                @elseif (Session::get('role_id')==4)
                <li><a><i class="fa fa-home"></i>Finance<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::to('pending-page/7')}}"Finance-Commission-Verified</a></li>
                      <li><a href="{{URL::to('pending-page/8')}}">Finance-Commission-Declined</a></li>
                      <li><a href="{{URL::to('pending-page/9')}}">Finance-Commission-Paid</a></li>
                     
                      
                    </ul>
                  </li>

                @elseif (Session::get('role_id')==5)
                <li><a><i class="fa fa-home"></i>Agent<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="{{URL::to('pending-page/1')}}">Operation-Pending</a></li>
                      <li><a href="{{URL::to('pending-page/2')}}"">Operation-Sale-Verified</a></li>
                      <li><a href="{{URL::to('pending-page/3')}}"">Operation-Sale-Decline</a></li>
                      <li><a href="{{URL::to('pending-page/4')}}">Vertical-Commission-Declined</a></li>
                      
                    </ul>
                  </li>

                @endif
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->    

            
          </div>
        </div>
