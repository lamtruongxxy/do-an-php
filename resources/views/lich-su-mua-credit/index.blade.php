@extends ('master')
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
  <div class="col-7">
    <div class="card">
      <div class="card-body">
        <table id="goi-credit-datatable" class="table nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên người chơi</th>
              <th>Gói credit</th>
              <th>Credit</th>
              <th>Số tiền</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dsLichSuMuaCredit as $lichsu)
            <tr>
              <td>{{ $lichsu->id }}</td>
              <td>{{ $lichsu->id_nguoi_choi }}</td>
              <td>{{ $lichsu->id_goi_credit }}</td>
              <td>{{ $lichsu->credit }}</td>
              <td>{{ $lichsu->so_tien }}</td>
              <td>
                <button class="btn btn-warning" data-toggle="modal" data-target="#form-edit"><i class='far fa-edit'></i></button>
                <button class="btn btn-danger"><i class='far fa-trash-alt'></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
  <div class="col-5">
    <div class="card-box">
      <h4 class="header-title">Thêm mới gói credit</h4><br>
      <form action="#" method="POST" class="parsley-examples">
        @csrf
        <div class="form-group">
          <label for="userName">Tên gói credit<span class="text-danger">*</span></label>
          <input type="text" parsley-trigger="change" required placeholder="Nhập tên gói credit" class="form-control" id="">
        </div>
        <div class="form-group">
          <label for="userName">Credit<span class="text-danger">*</span></label>
          <input type="number" parsley-trigger="change" required placeholder="Nhập số credit" class="form-control" id="">
        </div>
        <div class="form-group">
          <label for="userName">Số tiền<span class="text-danger">*</span></label>
          <input type="number" parsley-trigger="change" required placeholder="Nhập số tiền" class="form-control" id="">
        </div>
        <div class="form-group text-right mb-0">
          <button class="btn btn-primary waves-effect waves-light" type="submit">
            <i class="fas fa-plus"></i>
            Thêm
          </button>
          <button type="reset" class="btn btn-secondary waves-effect">
            Huỷ bỏ
          </button>
        </div>
      </form>
    </div> <!-- end card-box -->
  </div> <!-- end col-->
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;" id="form-edit">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myCenterModalLabel">Cập nhật lĩnh vực</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <span id="thong_bao"></span>
        <form action="#" class="parsley-examples" id="form_edit">
          <input type="hidden" name="id" id="" value="">
          <div class="form-group">
            <label for="userName">Tên gói credit<span class="text-danger">*</span></label>
            <input type="text" parsley-trigger="change" required placeholder="Nhập tên gói credit" class="form-control" id="">
          </div>
          <div class="form-group">
            <label for="userName">Credit<span class="text-danger">*</span></label>
            <input type="number" parsley-trigger="change" required placeholder="Nhập số credit" class="form-control" id="">
          </div>
          <div class="form-group">
            <label for="userName">Số tiền<span class="text-danger">*</span></label>
            <input type="number" parsley-trigger="change" required placeholder="Nhập số tiền" class="form-control" id="">
          </div>
          <div class="form-group text-right mb-0">
            <button class="btn btn-primary waves-effect waves-light mr-1" id="sua_linh_vuc" type="submit">
              Cập nhật
            </button>
            <button type="button" id="close_form_edit" class="btn btn-secondary waves-effect">
              Huỷ bỏ
            </button>
          </div>
        </form>
      </div>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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