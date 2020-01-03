@extends('master')

@section('content')
<div class="row justify-content-center mt-4">
  <div class="col-md-8 col-lg-6 col-xl-5">
      <div class="error-ghost text-center">
          <img src="{{ asset('assets/images/error.svg') }}" width="300" alt="error-image"/>
      </div>

      <div class="text-center">
          <h3 class="mt-4 text-uppercase font-weight-bold">Không tìm thấy trang</h3>

          <a class="btn btn-info mt-3" href="{{ route('index') }}"><i class="mdi mdi-reply mr-1"></i>Quay về trang chử</a>
      </div>      

  </div> <!-- end col -->
</div>
@stop