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
								<button class="btn btn-warning"><i class='far fa-edit'></i></button>
								<button class="btn btn-danger"><i class='far fa-trash-alt'></i></button>
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
<!-- sweetalert -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}" type="text/javascript"></script>
<!-- call ajax -->
<script src="{{ asset('assets/libs/ajax/callAjax.js') }}" type="text/javascript"></script>
<!-- Plugin js-->
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

<!-- Validation init js-->
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<!-- third party js ends -->
<!-- Datatables init -->
<script src="{{ asset('assets/js/pages/cau-hoi.js') }}"></script>
@endpush