<header id="topnav">
  <!-- Topbar Start -->
  <div class="navbar-custom">
    <div class="container-fluid">
      <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
          <!-- Mobile menu toggle-->
          <a class="navbar-toggle nav-link">
            <div class="lines">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </a>
          <!-- End mobile menu toggle-->
        </li>

        <li class="d-none d-sm-block">
          <form class="app-search">
            <div class="app-search-box">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Tìm kiếm...">
                <div class="input-group-append">
                  <button class="btn" type="submit">
                    <i class="fe-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </li>

        

        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-image" class="rounded-circle">
            <span class="pro-user-name ml-1">
              @auth
                {{ Auth::user()->ten_dang_nhap }}
              @endauth  
            <i class="mdi mdi-chevron-down"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <div class="dropdown-item noti-title">
              <h5 class="m-0">
                Chào mừng !
              </h5>
            </div>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <i class="fe-user"></i>
              <span>Tài khoản của tôi</span>
            </a>

            <!-- item-->
            <a href="{{ route('logout')}}" class="dropdown-item notify-item">
              <i class="fe-log-out"></i>
              <span>Đăng xuất</span>
            </a>

          </div>
        </li>

      </ul>

      <!-- LOGO -->
      <div class="logo-box">
        <a href="{{ route('linh-vuc.index') }}" class="logo text-center">
          <span class="logo-lg">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="50">
            <!-- <span class="logo-lg-text-dark">Upvex</span> -->
          </span>
          <span class="logo-sm">
            <!-- <span class="logo-sm-text-dark">X</span> -->
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="28">
          </span>
        </a>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- end Topbar -->
  @include('components.navbar')
  <!-- end navbar-custom -->

</header>