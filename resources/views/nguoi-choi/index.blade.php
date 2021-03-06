@extends ('master')
@section('title', 'Danh sách người chơi')
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
							<td>Họ tên</td>
							<td>Email</td>
							<td>Điểm cao nhất</td>
							<td>Credit</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
			<tr>
            @foreach($dsNguoiChoi as $nguoichoi)
              <td>{{ $nguoichoi->id }}</td>
              <td>
								<img src="{{ asset('storage') }}/avatar/{{ $nguoichoi->hinh_dai_dien }}" width="50" height="50" alt="">
								<a 
									href="{{ route('nguoi-choi.profile', ['name' => $nguoichoi->ten_dang_nhap]) }}" 
									class="ml-2"
									style="color: #6c757d">
									{{ $nguoichoi->ten_dang_nhap }}
								</a>
							</td>
							<td>{{ $nguoichoi->ho_ten }}</td>
              <td>{{ $nguoichoi->email }}</td>
              <td>{{ $nguoichoi->diem_cao_nhat }}</td>
              <td>{{ $nguoichoi->credit }}</td>
              <td>
                <form action="{{ route('nguoi-choi.remove', ['id' => $nguoichoi->id]) }}" method="POST">
               	@csrf
               	@method('DELETE')
               	 <button class="btn btn-danger xoa-nguoi-choi"><i class='far fa-trash-alt'></i> Xóa</button>
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
    $(document).on('click', '.xoa-nguoi-choi', function(e) {
			e.preventDefault();
			var th = $(this);
				Swal.fire({
					title: "Bạn có chắc muốn xoá?",
					html: "<div class='text-secondary'>Lưu ý: Người chơi bị xoá có thể được khôi phục lại</div>",
					type: "warning",
					showCancelButton: !0,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Xác nhận",
					cancelButtonText: "Huỷ bỏ"
				}).then(function(t) {
						if (t.value) {
							th.parent().submit();
						}
				});
		})

  });
</script>
@include('components.toast')
@endpush