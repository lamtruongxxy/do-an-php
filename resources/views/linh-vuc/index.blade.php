@extends ('master')
@section ('css')
@parent
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">
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
			<h4 class="page-title">Danh sách lĩnh vực</h4>
		</div>
	</div>
</div>
<!-- end page title -->
<div class="row">
	<div class="col-7">
		<div class="card">
			<div class="card-body">
				<table id="linh-vuc-datatable" class="table nowrap">
					<thead>
						<tr>
							<th width="">ID</th>
							<th width="">Tên lĩnh vực</th>
							<th>Hình ảnh</th>
							<th width=""></th>
						</tr>
					</thead>
					<tbody>
						@foreach($dsLinhVuc as $linhvuc)
							<tr>
								<td>{{ $linhvuc->id }}</td>
								<td>{{ $linhvuc->ten_linh_vuc }}</td>
								<td>
									<img src="{{ asset('storage') }}/linh-vuc/{{ $linhvuc->hinh_anh }}" width="45"/>
								</td>
								<td>
									<form action="{{ route('linh-vuc.remove', ['id' => $linhvuc->id ]) }}" method="POST">
										@csrf
										@method('DELETE')
										<button 
										  class='btn btn-warning waves-effect waves-light sua-linh-vuc' 
										  type='button'
										  data-toggle='modal'
										  data-target='#form-edit'
										  data-id='{{ $linhvuc->id }}'
											data-name='{{ $linhvuc->ten_linh_vuc }}'
											data-img='{{ $linhvuc->hinh_anh }}'>
											<i class='far fa-edit'></i>
											Sửa
										</button>
										<button 
										  type='submit'
										  class='btn btn-danger waves-effect waves-light xoa-linh-vuc'>
											<i class='far fa-trash-alt'></i>
											Xoá
										</button>
									</form>
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
			<h4 class="header-title">Thêm mới lĩnh vực</h4><br>
			<form action="{{ route('linh-vuc.store') }}" method="POST" class="parsley-examples" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="userName">Tên lĩnh vực<span class="text-danger">*</span></label>
					<input type="text" name="ten_linh_vuc" value="{{ old('ten_linh_vuc') }}" parsley-trigger="change" required placeholder="Nhập tên lĩnh vực" class="form-control" id="ten_linh_vuc">
				</div>
				<div class="form-group">
					<label for="userName">Hình ảnh<span class="text-danger">*</span></label>
					<input type="file" name="hinh_anh" class="form-control-file">
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
				<form action="{{ route('linh-vuc.update') }}" method="POST" class="parsley-examples" id="form_edit" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<input type="hidden" name="id" id="id_linh_vuc" value="">
					<div class="form-group">
						<label for="userName">Tên lĩnh vực<span class="text-danger">*</span></label>
						<input type="text" name="ten_linh_vuc" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="ten_linh_vuc_edit" value="">
					</div>
					<div class="form-group">
						<label for="userName">Hình ảnh<span class="text-danger">*</span></label>
						<img src="" width="100" id="hinh_anh_edit"/><p></p>
						<input type="file" name="hinh_anh_new" id="linh_vuc_edit" class="form-control-file">
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
<!-- Plugin js-->
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
<!-- Validation init js-->
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<!-- third party js ends -->
<script>
	$(document).ready(function() {
		$("#linh-vuc-datatable").DataTable({
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

		$(document).on('click', '.sua-linh-vuc', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
				var img = $(this).data('img');
        $("#id_linh_vuc").val(id);
        $("#ten_linh_vuc_edit").val(name);
				$("#hinh_anh_edit").attr('src', "{{ asset('storage') }}/linh-vuc/" + img);
    });

		$(document).on('click', '.xoa-linh-vuc', function(e) {
			e.preventDefault();
			var th = $(this);
			Swal.fire({
				title: "Bạn có chắc muốn xoá?",
				html: "<div class='text-secondary'>Lưu ý: Lĩnh vực bị xoá có thể khôi phục lại</div>",
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
			})
		});

		$(document).on('change', '#linh_vuc_edit', function(e) {
			if (this.files && this.files[0]) {
				const reader = new FileReader();
				reader.onload = function(e) {
					$("#hinh_anh_edit").attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			}
		});
		
	});
</script>
@include('components.toast')
@endpush