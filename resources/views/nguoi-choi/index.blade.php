@extends ('master')
@section ('css')
@parent
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">
@stop

@section('content')
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
			<h4 class="page-title">Danh sách người chơi</h4>
		</div>
	</div>
</div>
<!-- end page title -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table id="nguoi-choi-datatable" class="table">
					<thead>
						<tr>
							<td>ID</td>
							<td>Tên đăng nhập</td>
							<td>Email</td>
							<td>Điểm cao nhất</td>
							<td>Credit</td>
							<td>Hình đại diện</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
            @foreach($dsNguoiChoi as $nguoichoi)
              <td>{{ $nguoichoi->id }}</td>
              <td>{{ $nguoichoi->ten_dang_nhap }}</td>
              <td>{{ $nguoichoi->email }}</td>
              <td>{{ $nguoichoi->diem_cao_nhat }}</td>
              <td>{{ $nguoichoi->credit }}</td>
              <td>{{ $nguoichoi->hinh_dai_dien }}</td>
              <td>
                <a href="#" class="btn btn-warning"><i class='far fa-edit'></i></a>
                <button class="btn btn-danger"><i class='far fa-trash-alt'></i></button>
              </td>
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
<!-- Plugin js-->
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
<!-- third party js ends -->
<script>
  $(document).ready(function() {
    $('#nguoi-choi-datatable').DataTable({
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