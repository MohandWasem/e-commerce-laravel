<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{asset('admin/images/faces/face1.jpg')}}" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                @if (Auth::guard('admin')->check())
                 <div class="nav-profile-text d-flex flex-column">
                   <span class="font-weight-bold mb-2">{{Auth::guard('admin')->user()->name}}</span>
                   <span class="text-secondary text-small">Project Manager</span>
                 </div>
                   @endif
                
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            @if($priv_login>100)
            <li class="nav-item">
              <a class="nav-link" href="{{route('dash/index')}}">
                <span class="menu-title">Users</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="{{route('view/product')}}">
                <span class="menu-title">Products</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           @yield("content")
          </div>