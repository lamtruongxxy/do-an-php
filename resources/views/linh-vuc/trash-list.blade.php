@extends('master')
@section('css')
	@parent
	<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">
@stop
@section('content')
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
          <h4 class="page-title">Danh sách lĩnh vực đã xoá</h4>
      </div>
  </div>
</div>     
<!-- end page title --> 

<div class="row">
  <div class="col-12">
    @include('components.errors')
    @include('components.success')
      <div class="card">
          <div class="card-body">
              <table id="basic-datatable" class="table nowrap">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Tên lĩnh vực</th>
                          <th>Ngày xoá</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                  	@foreach($db as $linhvuc)
	                      <tr>
	                          <td>{{ $linhvuc->id }}</td>
	                          <td>{{ $linhvuc->ten_linh_vuc }}</td>
	                          <td>{{ $linhvuc->deleted_at }}</td>
	                          <td>
	                          	<form action="{{ route('linh-vuc.restore') }}" method="POST">
	                          		<input type="hidden" name="id" value="{{ $linhvuc->id }}">
	                          		@csrf
		                          	<div class="button-list">
	                                  <button type="submit" class="btn btn-purple waves-effect waves-light">
	                                      <span class="btn-label"><i class="fas fa-trash-restore"></i></span>Khôi phục
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
<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endpush