@extends('master')

@section('content')

<!-- start page title -->
<div class="row">
  <div class="col-12">
      <div class="page-title-box">
          <div class="page-title-right">
              <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Upvex</a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Extras</a></li>
                  <li class="breadcrumb-item active">Profile</li>
              </ol>
          </div>
          <h4 class="page-title">Profile</h4>
      </div>
  </div>
</div>     
<!-- end page title --> 


<div class="row">
  <div class="col-lg-4 col-xl-4">
      <div class="card-box text-center">
          <img src="{{ asset('storage') }}/avatar/{{ $nguoiChoi->hinh_dai_dien }}" alt="user-pic" class="rounded-circle avatar-lg img-thumbnail" />

          <h4 class="mb-0">{{ $nguoiChoi->ten_dang_nhap }}</h4>
          <p class="text-muted">Hạng {{ $hang + 1 }}</p>

          <div class="text-left mt-3">
              <p class="text-muted mb-2 font-13"><strong>Họ tên :</strong> <span class="ml-2"> {{ $nguoiChoi->ho_ten }}</span></p>
              <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">{{ $nguoiChoi->email }}</span></p>
              <p class="text-muted mb-2 font-13"><strong>Tổng điểm :</strong> <span class="ml-2 ">{{ $nguoiChoi->diem_cao_nhat }}</span></p>

          </div>
      </div> <!-- end card-box -->


  </div> <!-- end col-->

  <div class="col-lg-8 col-xl-8">
      <div class="card-box">
          
        <h4 class="header-title mb-3">Lịch sử mua credit</h4>

        <div class="table-responsive">
            <table class="table table-centered table-borderless table-hover table-nowrap mb-0" id="ls-mua-credit">
                <thead class="thead-light">
                <tr>
                  <th class="border-top-0">Thời gian mua</th>
                  <th class="border-top-0">Gói credit</th>
                  <th class="border-top-0">Số tiền</th>
                  <th class="border-top-0">Tình trạng</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($lsMuaCredit as $ls)
                      <tr>
                          <td>
                              <span class="ml-2">{{ $ls->ngay_mua }}</span>
                          </td>
                          <td>{{ $ls->goiCredit->ten_goi }}</td>
                          <td>{{ $ls->goiCredit->so_tien_format }}</td>
                          @if($ls->trang_thai)
                              <td><span class="badge badge-pill badge-success">Success</span></td>
                          @else
                              <td><span class="badge badge-pill badge-danger">Failed</span></td>
                          @endif
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- end table-responsive -->
          
      </div> <!-- end card-box-->

      <div class="card-box">

      <h4 class="header-title mb-3">lịch sử lượt chơi</h4>

      <div class="table-responsive">
          <table class="table table-centered table-borderless table-hover table-nowrap mb-0" id="ls-luot-choi">
              <thead class="thead-light">
                <tr>
                    <th class="border-top-0">Số câu</th>
                    <th class="border-top-0">Điểm</th>
                    <th class="border-top-0">Thời gian chơi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($lsLuotChoi as $ls)
                    <tr>
                        <td>
                            <span class="ml-2">{{ $ls->so_cau }}</span>
                        </td>
                        <td>{{ $ls->diem }}</td>
                        <td>{{ $ls->created_at }}</td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
      </div> <!-- end table-responsive -->

      </div>

  </div> <!-- end col -->



</div>
<!-- end row-->

@endsection

@push('scripts')


<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>

<script>

$(document).ready(function() {
    $('#ls-mua-credit').DataTable({
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

    $('#ls-luot-choi').DataTable({
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
})

</script>
@endpush