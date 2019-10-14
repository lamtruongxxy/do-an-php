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
                <input type="text" class="form-control" placeholder="Search...">
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
              Marcia J. <i class="mdi mdi-chevron-down"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <div class="dropdown-item noti-title">
              <h5 class="m-0">
                Welcome !
              </h5>
            </div>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <i class="fe-user"></i>
              <span>My Account</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <i class="fe-log-out"></i>
              <span>Logout</span>
            </a>

          </div>
        </li>

      </ul>

      <!-- LOGO -->
      <div class="logo-box">
        <a href="index.html" class="logo text-center">
          <span class="logo-lg">
            <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="26">
            <!-- <span class="logo-lg-text-dark">Upvex</span> -->
          </span>
          <span class="logo-sm">
            <!-- <span class="logo-sm-text-dark">X</span> -->
            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="28">
          </span>
        </a>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- end Topbar -->

  <div class="topbar-menu">
    <div class="container-fluid">
      <div id="navigation">
        <!-- Navigation Menu-->
        <ul class="navigation-menu">

          <li class="has-submenu">
            <a href="#">
              <i class="la la-dashboard"></i>Trang chủ</a>
          </li>

          <li class="has-submenu">
            <a href="#">
              <i class="la la-cube"></i>Lĩnh vực <div class="arrow-down"></div></a>
            <ul class="submenu">
              <li>
                <a href="{{ route('linh-vuc.index') }}">Danh sách lĩnh vực</a>
              </li>
              <li>
                <a href="{{ route('linh-vuc.trash') }}">Danh sách lĩnh vực bị xoá</a>
              </li>
            </ul>
          </li>

          <li class="has-submenu">
            <a href="{{ route('cau-hoi.index') }}">
              <i class="la la-cube"></i>Câu hỏi</a>
            <ul class="submenu">
              <li>
                <a href="{{ route('cau-hoi.index') }}">Danh sách câu hỏi</a>
              </li>
              <li>
                <a href="{{ route('cau-hoi.create') }}">Thêm câu hỏi</a>
              </li>
              <li>
                <a href="{{ route('cau-hoi.trash') }}">Danh sách câu hỏi bị xoá</a>
              </li>
            </ul>
          </li>

          <li class="has-submenu">
            <a href="{{ route('goi-credit.index') }}">
              <i class="la la-cube"></i>Gói Credit</a>
            <ul class="submenu">
              <li>
                <a href="{{ route('goi-credit.index') }}">Danh sách gói credit</a>
              </li>
              <li>
                <a href="{{ route('goi-credit.trash') }}">Danh sách gói credit bị xoá</a>
              </li>
            </ul>
          </li>

          <li class="has-submenu">
            <a href="{{ route('nguoi-choi.index') }}">
              <i class="la la-cube"></i>Người chơi</a>
            <ul class="submenu">
              <li>
                <a href="{{ route('nguoi-choi.index') }}">Danh sách người chơi</a>
              </li>
              <li>
                <a href="{{ route('nguoi-choi.trash') }}">Danh sách người chơi bị khoá</a>
              </li>
            </ul>
          </li>

          <li class="has-submenu">
            <a href="{{ route('lich-su-mua-credit.index') }}">
              <i class="la la-cube"></i>Lịch sử mua credit</a>
            <ul class="submenu">
              <li>
                <a href="{{ route('lich-su-mua-credit.index') }}">Lịch sử mua credit</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- End navigation menu -->

        <div class="clearfix"></div>
      </div>
      <!-- end #navigation -->
    </div>
    <!-- end container -->
  </div>
  <!-- end navbar-custom -->

</header>