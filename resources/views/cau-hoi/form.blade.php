@extends('master')
@section('css')
@parent
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
      <h4 class="page-title">Thêm câu hỏi</h4>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-6">

    <div class="card-box">
      <form action="#" class="parsley-examples">
        <div class="form-group">
          <label for="userName">Nội dung<span class="text-danger">*</span></label>
          <textarea class="form-control" name="noi_dung" parsley-trigger="change" required rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="emailAddress">Lĩnh vực<span class="text-danger">*</span></label>
          <select class="form-control" id="example-select">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="phuong_an_a">Phương án A<span class="text-danger">*</span></label>
          <input id="phuong_an_a" type="text" placeholder="Phương án A" required class="form-control">
        </div>
        <div class="form-group">
          <label for="phuong_an_b">Phương án B<span class="text-danger">*</span></label>
          <input id="phuong_an_b" type="text" placeholder="Phương án B" required class="form-control">
        </div>
        <div class="form-group">
          <label for="phuong_an_c">Phương án C<span class="text-danger">*</span></label>
          <input id="phuong_an_c" type="text" placeholder="Phương án C" required class="form-control">
        </div>
        <div class="form-group">
          <label for="phuong_an_d">Phương án D<span class="text-danger">*</span></label>
          <input id="phuong_an_d" type="text" placeholder="Phương án D" required class="form-control">
        </div>
        <div class="form-group">
          <label for="dap_an">Đáp án<span class="text-danger">*</span></label>
          <select class="form-control" id="dap_an">
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
          </select>
        </div>
        <div class="form-group text-right mb-0">
          <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
            Thêm
          </button>
          <button type="reset" class="btn btn-secondary waves-effect">
            Huỷ bỏ
          </button>
        </div>

      </form>
    </div> <!-- end card-box -->
  </div>
</div>
@stop

@push('scripts')
<!-- Plugin js-->
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

<!-- Validation init js-->
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
@endpush