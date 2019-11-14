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