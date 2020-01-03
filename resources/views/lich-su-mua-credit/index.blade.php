@extends ('master')
@section('title', 'Lịch sử mua credit')
@section ('css')
@parent
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
@stop
@section ('content')
<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Upvex</a></li>
          <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
          <li class="breadcrumb-item active">Datatables</li>
        </ol>
      </div>
      <h4 class="page-title">Danh sách gói credit</h4>
    </div>
  </div>
</div>
<!-- end page title -->

<div class="row">
  <div class="col-xl-4">
      <div class="card-box">
        <div class="row">
            <div class="col-6">
                <div class="avatar-sm bg-light rounded">
                    <i class="fas fa-money-check-alt avatar-title font-22 text-success"></i>
                </div>
            </div>
            <div class="col-6">
                <div class="text-right">
                    <h3 class="text-dark my-1"><span data-plugin="">{{ $doanhThu }}</span></h3>
                    <p class="text-muted mb-1 text-truncate">Doanh thu hôm nay</p>
                </div>
            </div>
        </div>
    </div> <!-- end card-box-->
  </div><!-- end col -->

  <div class="col-xl-4">
      <div class="card-box">
        <div class="row">
            <div class="col-6">
                <div class="avatar-sm bg-light rounded">
                    <i class="fas fa-money-check-alt avatar-title font-22 text-danger"></i>
                </div>
            </div>
            <div class="col-6">
                <div class="text-right">
                    <h3 class="text-dark my-1"><span data-plugin="">{{ $doanhThuThang }}</span></h3>
                    <p class="text-muted mb-1 text-truncate">Doanh thu tháng {{ $thang }} năm {{ $nam }}</p>
                </div>
            </div>
        </div>
    </div> <!-- end card-box-->
  </div><!-- end col -->

  <div class="col-xl-4">
      <div class="card-box">
        <div class="row">
            <div class="col-6">
                <div class="avatar-sm bg-light rounded">
                    <i class="fas fa-money-check-alt avatar-title font-22 text-warning"></i>
                </div>
            </div>
            <div class="col-6">
                <div class="text-right">
                    <h3 class="text-dark my-1"><span data-plugin="">{{ $doanhThuNam }}</span></h3>
                    <p class="text-muted mb-1 text-truncate">Doanh thu năm {{ $nam }}</p>
                </div>
            </div>
        </div>
    </div> <!-- end card-box-->
  </div><!-- end col -->

</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <table id="goi-credit-datatable" class="table nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Người chơi</th>
              <th>Gói credit</th>
              <th>Credit</th>
              <th>Số tiền</th>
              <th>Ngày mua</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dsLichSuMuaCredit as $lichsu)
            <tr>
              <td>{{ $lichsu->id }}</td>
              <td>
                <img src="{{ asset('storage') }}/avatar/{{ $lichsu->nguoiChoi->hinh_dai_dien }}" width="50" height="50" alt="">
                <span>{{ $lichsu->nguoiChoi->ho_ten }}</span>
              </td>
              <td>{{ $lichsu->goiCredit->ten_goi }}</td>
              <td>{{ $lichsu->goiCredit->credit }}</td>
              <td>{{ $lichsu->goiCredit->so_tien }}</td>
              <td>{{ $lichsu->ngay_mua }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
@stop

@push('scripts')
<!-- third party js -->
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/libs/custombox/custombox.min.js') }}"></script>
<!-- sweetalert -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}" type="text/javascript"></script>
<!-- call ajax -->
<script src="{{ asset('assets/libs/ajax/callAjax.js') }}" type="text/javascript"></script>
<!-- Plugin js-->
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

<!-- Validation init js-->
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<!-- third party js ends -->

<script>
  $(document).ready(function() {
    $('#goi-credit-datatable').DataTable({
      language: {
        paginate: {
          previous: "<i class='mdi mdi-chevron-left'>",
          next: "<i class='mdi mdi-chevron-right'>"
        }
      },
      drawCallback: function() {
        $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
      },
    });
  });
</script>
@endpush