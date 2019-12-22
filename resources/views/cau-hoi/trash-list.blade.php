@extends ('master')
@section('title', 'Danh sách câu hỏi đã xoá')
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
			<h4 class="page-title">Danh sách lĩnh vực</h4>
		</div>
	</div>
</div>
<!-- end page title -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table id="cau-hoi-datatable" class="table dt-responsive">
					<thead>
						<tr>
							<td>ID</td>
							<td>Nội dung</td>
							<td>Lĩnh vực</td>
							<td>Phương án A</td>
							<td>Phương án B</td>
							<td>Phương án C</td>
							<td>Phương án D</td>
							<td>Đáp án</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($dsCauHoi as $cauhoi)
						<tr>
							<td>{{ $cauhoi->id }}</td>
							<td>{{ $cauhoi->noi_dung }}</td>
							<td>{{ $cauhoi->linh_vuc_id }}</td>
							<td>{{ $cauhoi->phuong_an_a }}</td>
							<td>{{ $cauhoi->phuong_an_b }}</td>
							<td>{{ $cauhoi->phuong_an_c }}</td>
							<td>{{ $cauhoi->phuong_an_d }}</td>
							<td>{{ $cauhoi->dap_an }}</td>
							<td>
								<form action="{{ route('cau-hoi.restore', ['id' => $cauhoi->id]) }}" method="POST">
									@csrf
									<div class="button-list">
											<button type="submit" class="btn btn-purple waves-effect waves-light khoi-phuc-cau-hoi">
													<span class="btn-label"><i class="fas fa-trash-restore"></i></span>Khôi phục
											</button>

											<button type="submit" class="btn btn-danger xoa-cau-hoi">
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

<!-- Validation init js-->
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<!-- third party js ends -->
<!-- Datatables init -->
<script>
	$(document).ready(function() {
		$('#cau-hoi-datatable').DataTable({
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

		 $(document).on('click', '.xoa-cau-hoi', function(e) {
		      e.preventDefault();
		      var th = $(this);
                Swal.fire({
                        title: "Bạn có chắc muốn xoá?",
                        html: "<div class='text-secondary'>Lưu ý: Câu hỏi bị xoá không thể khôi phục lại</div>",
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