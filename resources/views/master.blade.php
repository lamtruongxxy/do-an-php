<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
  @section('css')
  <!-- App css -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
  <!-- Jquery Toast css -->
  <link href="{{ asset('assets/libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />
  @show
</head>

<body>

  <!-- Navigation Bar-->
    @include('components.header')
  <!-- End Navigation Bar-->

  <!-- ============================================================== -->
  <!-- Start Page Content here -->
  <!-- ============================================================== -->

  <div class="wrapper">
    <div class="container-fluid">

      <!-- start page title -->
      @yield('content')
      <!-- end page title -->


    </div> <!-- end container -->
  </div>
  <!-- end wrapper -->

  <!-- ============================================================== -->
  <!-- End Page content -->
  <!-- ============================================================== -->
  <!-- Footer Start -->
  <footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          2019 &copy; Upvex theme by <a href="">Coderthemes</a>
        </div>
        <div class="col-md-6">
          <div class="text-md-right footer-links d-none d-sm-block">
            <a href="javascript:void(0);">About Us</a>
            <a href="javascript:void(0);">Help</a>
            <a href="javascript:void(0);">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end Footer -->

  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>
  <!-- Vendor js -->
  <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
  <!-- Toast-->
  <script src="{{ asset('assets/libs/jquery-toast/jquery.toast.min.js') }}"></script>
  <!-- sweetalert -->
  <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
  @stack('scripts')
  <!-- App js-->
  <script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>

</html>