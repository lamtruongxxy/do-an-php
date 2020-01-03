@extends ('master')
@section('title', 'Danh sách gói credit đã xoá')
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
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <table id="goi-credit-datatable" class="table nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên gói</th>
              <th>Credit</th>
              <th>Số tiền</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($dsGoiCredit as $goiCredit)
            <tr>
              <td>{{ $goiCredit->id }}</td>
              <td>{{ $goiCredit->ten_goi }}</td>
              <td>{{ $goiCredit->credit_format }}</td>
              <td>{{ $goiCredit->so_tien_format }}</td>
              <td class="d-flex">
                <form action="{{ route('goi-credit.restore') }}" method="POST">
                  <input type="hidden" name="id" value="{{ $goiCredit->id }}">
                  @csrf
                  <div class="button-list">
                      <button type="submit" class="btn btn-purple waves-effect waves-light">
                          <span class="btn-label"><i class="fas fa-trash-restore"></i></span>Khôi phục
                      </button>
                  </div>                              
                </form>
                &nbsp;&nbsp;
                <form action="{{ route('goi-credit.delete', ['id' => $goiCredit->id]) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <div class="button-list">
                   <button type="submit" class="btn btn-danger xoa-vinh-vien">
                          <span class="btn-label"><i class='far fa-trash-alt'></i></span>Xóa
                      </button>
                    </div>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
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
<!-- Plugin js-->
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
<!-- third party js ends -->

<script>
    $(document).ready(function() {
      $("#goi-credit-datatable").DataTable({
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

      $(document).on('click', '.xoa-vinh-vien', function(e) {
        e.preventDefault();
        var th = $(this);
        Swal.fire({
          title: "Bạn có chắc muốn xoá?",
          html: "<div class='text-secondary'>Lưu ý: Gói credit bị xoá không thể khôi phục lại</div>",
          type: "warning",
          showCancelButton: !0,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Xác nhận",
          cancelButtonText: "Huỷ bỏ"
            }).then(function(t) {
                if (t.value) {
                  th.parent().parent().submit();
                }
            });
        })


    });
</script>
@include('components.toast')
@endpush