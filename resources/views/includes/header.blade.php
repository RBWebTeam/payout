
 <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                     @if(session()->has('email')) {{Session::get('name')}} @endif
                    
                  </a>
                  
                </li>

                <li role="presentation" class="dropdown">
                  <a href="{{URL::to('logout')}}">
                    <span class="glyphicon glyphicon-log-out"></span>
                  </a>
                  </li>

                <li role="presentation" class="dropdown">
                  
                  <a href="{{URL::to('/dashboard')}}">
                    <span class="glyphicon glyphicon-home"></span>
                  </a>
                  
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->