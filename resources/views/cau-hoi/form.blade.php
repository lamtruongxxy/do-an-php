@extends('master')
@section('title', 'Xử lý câu hỏi')
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
      <h4 class="page-title">
        {{ isset($cauhoi) ? 'Sửa câu hỏi' : 'Thêm câu hỏi' }}
      </h4>
    </div>
  </div>
</div>
@include('components.errors')
<div class="row">
  <div class="col-lg-6">
    <div class="card-box">
      <form 
        action="{{ isset($cauhoi) ? route('cau-hoi.update', ['id' => $cauhoi->id]) : route('cau-hoi.store') }}" 
        method="POST" 
        class="parsley-examples">
        @csrf
        @if (isset($cauhoi))
          <input type="hidden" name="_method" value="PUT">
        @endif
        <div class="form-group">
          <label for="userName">Nội dung<span class="text-danger">*</span></label>
          <textarea class="form-control" name="noi_dung" parsley-trigger="change" rows="3">{{ isset($cauhoi) ? $cauhoi->noi_dung : '' }}</textarea>
        </div>
        <div class="form-group">
          <label for="emailAddress">Lĩnh vực<span class="text-danger">*</span></label>
          <select class="form-control" name="linh_vuc_id" id="example-select">
            <option>Chọn lĩnh vực</option>
            @foreach($dsLinhVuc as $linhvuc)
            <option 
            value="{{ $linhvuc->id }}"
            {{ isset($cauhoi) && $cauhoi->linh_vuc_id === $linhvuc->id ? 'selected' : '' }}
            >{{ $linhvuc->ten_linh_vuc }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="phuong_an_a">Phương án A<span class="text-danger">*</span></label>
          <input 
            id="phuong_an_a" 
            type="text" 
            placeholder="Phương án A" 
            name="phuong_an_a" 
          
            class="form-control"
            value="{{ old('phuong_an_a', isset($cauhoi) ? $cauhoi->phuong_an_a : '') }}">
        </div>
        <div class="form-group">
          <label for="phuong_an_b">Phương án B<span class="text-danger">*</span></label>
          <input 
            id="phuong_an_b" 
            type="text" 
            placeholder="Phương án B" 
            name="phuong_an_b" 
             
            class="form-control"
            value="{{ old('phuong_an_b', isset($cauhoi) ? $cauhoi->phuong_an_b : '') }}">
        </div>
        <div class="form-group">
          <label for="phuong_an_c">Phương án C<span class="text-danger">*</span></label>
          <input 
            id="phuong_an_c" 
            type="text" 
            placeholder="Phương án C" 
            name="phuong_an_c" 
           
            class="form-control"
            value="{{ old('phuong_an_c', isset($cauhoi) ? $cauhoi->phuong_an_c : '') }}">
        </div>
        <div class="form-group">
          <label for="phuong_an_d">Phương án D<span class="text-danger">*</span></label>
          <input 
            id="phuong_an_d" 
            type="text" 
            placeholder="Phương án D" 
            name="phuong_an_d" 
            
            class="form-control"
            value="{{ old('phuong_an_d', isset($cauhoi) ? $cauhoi->phuong_an_d : '') }}">
        </div>
        <div class="form-group">
          <p for="dap_an">Đáp án<span class="text-danger">*</span></p>
          <div class="radio radio-primary form-check-inline">
              <input 
                type="radio" 
                id="dap_an_a" 
                value="A" 
                name="dap_an" 
                {{ isset($cauhoi) && $cauhoi->dap_an === 'A' ? 'checked' : '' }}>
              <label for="dap_an_a">A</label>
          </div>
          <div class="radio radio-primary form-check-inline">
              <input 
                type="radio" 
                id="dap_an_b" 
                value="B" 
                name="dap_an"
                {{ isset($cauhoi) && $cauhoi->dap_an === 'B' ? 'checked' : '' }}>
              <label for="dap_an_b">B</label>
          </div>
          <div class="radio radio-primary form-check-inline">
              <input 
                type="radio" 
                id="dap_an_c" 
                value="C" 
                name="dap_an"
                {{ isset($cauhoi) && $cauhoi->dap_an === 'C' ? 'checked' : '' }}>
              <label for="dap_an_c">C</label>
          </div>
          <div class="radio radio-primary form-check-inline">
              <input 
                type="radio" 
                id="dap_an_d" 
                value="D" 
                name="dap_an"
                {{ isset($cauhoi) && $cauhoi->dap_an === 'D' ? 'checked' : '' }}>
              <label for="dap_an_d">D</label>
          </div>
        </div>
        <div class="form-group text-right mb-0">
          <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
            Thêm
          </button>
          <button type="reset" class="btn btn-secondary waves-effect">
            Huỷ bỏ
          </button>
        </div>
        <div col-5>
          
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
@include('components.toast')
@endpush