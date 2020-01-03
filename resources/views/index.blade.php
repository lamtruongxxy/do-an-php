@extends ('master')

@section('title', 'Trang chủ')

@section('css')
@parent
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
			<h4 class="page-title">Trang chủ</h4>
		</div>
	</div>
</div>
<!-- end page title -->
<div class="row">
  <div class="col-xl-4">
      <div class="card-box">
        <div class="row">
            <div class="col-6">
                <div class="avatar-sm bg-light rounded">
                    <i class="far fa-user avatar-title font-22 text-success"></i>
                </div>
            </div>
            <div class="col-6">
                <div class="text-right">
                    <h3 class="text-dark my-1"><span data-plugin="counterup">{{ $tongNguoiChoi }}</span></h3>
                    <p class="text-muted mb-1 text-truncate">Tổng số người chơi</p>
                </div>
            </div>
        </div>
    </div> <!-- end card-box-->
  </div><!-- end col -->

  <div class="col-xl-4">
      <div class="card-box">
        <div class="row">
            <div class="col-6">
                <div class="avatar-sm bg-light rounded">
                    <i class="fab fa-google-play avatar-title font-22 text-danger"></i>
                </div>
            </div>
            <div class="col-6">
                <div class="text-right">
                    <h3 class="text-dark my-1"><span data-plugin="counterup">{{ $tongLuotChoi }}</span></h3>
                    <p class="text-muted mb-1 text-truncate">Tổng số lượt chơi hôm nay</p>
                </div>
            </div>
        </div>
    </div> <!-- end card-box-->
  </div><!-- end col -->

  <div class="col-xl-4">
      <div class="card-box">
        <div class="row">
            <div class="col-6">
                <div class="avatar-sm bg-light rounded">
                    <i class="fas fa-money-check avatar-title font-22 text-warning"></i>
                </div>
            </div>
            <div class="col-6">
                <div class="text-right">
                    <h3 class="text-dark my-1"><span>{{ $doanhThu }}</span></h3>
                    <p class="text-muted mb-1 text-truncate">Doanh thu hôm nay</p>
                </div>
            </div>
        </div>
    </div> <!-- end card-box-->
  </div><!-- end col -->

</div>

<div class="row">
  <div class="col-xl-12">

    <div class="card-box">
      <h4 class="header-title mb-3">Lịch sử mua credit hôm nay</h4>

      <div class="table-responsive">
          <table class="table table-centered table-borderless table-hover table-nowrap mb-0" id="ls-mua-credit">
              <thead class="thead-light">
                <tr>
                    <th class="border-top-0">Người chơi</th>
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
                            <img src="assets/images/users/user-2.jpg" alt="user-pic" class="rounded-circle avatar-sm" />
                            <span class="ml-2">{{ $ls->nguoiChoi->ho_ten }}</span>
                        </td>
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

  </div>

</div>

<div class="row">
  <div class="col-xl-12">

    <div class="card-box">
      <h4 class="header-title mb-3">Lượt chơi hôm nay</h4>

      <div class="table-responsive">
          <table class="table table-centered table-borderless table-hover table-nowrap mb-0" id="ls-luot-choi">
              <thead class="thead-light">
                <tr>
                    <th class="border-top-0">Người chơi</th>
                    <th class="border-top-0">Số câu</th>
                    <th class="border-top-0">Điểm</th>
                    <th class="border-top-0">Thời gian chơi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($lsLuotChoi as $ls)
                    <tr>
                        <td>
                            <img src="assets/images/users/user-2.jpg" alt="user-pic" class="rounded-circle avatar-sm" />
                            <span class="ml-2">{{ $ls->nguoiChoi->ho_ten }}</span>
                        </td>
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

    </div> <!-- end card-box-->

  </div>

</div>

@stop

@push('scripts')
<script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('assets/libs/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
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