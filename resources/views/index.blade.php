@extends('layouts.templateadmin')
@section('title','Dashborad Admin')

@section('content')
    <div class="content-wrapper">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <i class="mdi mdi-cube text-danger icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <p style="font-size:1rem;" class="mb-0 text-right">นศ. ในระบบกองทุน</p>
                    <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">{{number_format($count_student)}}</h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>จำนวนต่อคน
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <i class="mdi mdi-receipt text-warning icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <p style="font-size:1rem;" class="mb-0 text-right">นศ. ที่มีเอกสารในระบบ</p>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0">{{number_format($count_document)}}</h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i>จำนวนต่อคน
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <i class="mdi mdi-poll-box text-success icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <p style="font-size:1rem;" class="mb-0 text-right">นศ. ที่ส่งเอกสารครบ</p>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0">{{number_format($count_success)}}</h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i>จำนวนต่อคน
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <i class="mdi mdi-account-location text-info icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <p style="font-size:1rem;" class="mb-0 text-right">นศ. ที่ขาดส่งเอกสาร</p>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0">{{number_format($count_error)}}</h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-reload mr-1" aria-hidden="true"></i>จำนวนต่อคน
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-7 grid-margin stretch-card">
            <!--weather card-->
            <div class="card card-weather">
              <div class="card-body">
                <div class="weather-date-location">
                  <h3 style="font-size:1.25rem;">{{now()->format( 'l' )}}</h3>
                  <p class="text-gray">
                    <span style="font-size:1.25rem;" class="weather-date">{{now()->format( 'd' )}} {{now()->format( 'M' )}}, {{now()->format( 'Y' )}}</span>
                    <span class="weather-location">Thailand, TH</span>
                  </p>
                </div>
                <div class="weather-data d-flex">
                  <div class="mr-auto">
                    <p style="font-size:1.25rem;">Time Now</p>
                    <div id="txt" style="font-size:1.5rem;"></div>
                  </div>
                </div>
              </div>
            </div>
            <!--weather card ends-->
          </div>
          <div class="col-lg-5 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 style="font-size:1.25rem;font-family: 'Athiti', sans-serif;" class="card-title text-primary mb-5">รายการประเภทนักศึกษา จากจำนวนเอกสาร</h2>
                <div class="wrapper">
                  <div class="d-flex justify-content-between">
                    <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="mb-2">รายใหม่ จำนวน {{number_format($count_type1)}}</p>
                    <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="mb-2 text-primary">@if ($count_type1)
                      {{number_format(($count_type1/$count_document)*100,2)}}%
                    @endif </p>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: @if ($count_type1){{number_format(($count_type1/$count_document)*100,2)}}@endif%" aria-valuenow="@if ($count_type1){{number_format(($count_type1/$count_document)*100,2)}}@endif"aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="wrapper mt-4">
                  <div class="d-flex justify-content-between">
                    <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="mb-2">รายเก่าเลื่อนชั้นปี จำนวน {{number_format($count_type2)}}</p>
                    <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="mb-2 text-success">@if ($count_type2)
                      {{number_format(($count_type2/$count_document)*100,2)}}%
                    @endif </p>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: @if ($count_type2){{number_format(($count_type2/$count_document)*100,2)}}@endif%" aria-valuenow="@if ($count_type2){{number_format(($count_type2/$count_document)*100,2)}}@endif "aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="wrapper mt-4">
                  <div class="d-flex justify-content-between">
                    <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="mb-2">รายเก่าชั้นปี 1 จำนวน {{number_format($count_type3)}}</p>
                    <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="mb-2 text-success">@if ($count_type3)
                      {{number_format(($count_type3/$count_document)*100,2)}}%
                    @endif </p>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: @if ($count_type3){{number_format(($count_type3/$count_document)*100,2)}}@endif%" aria-valuenow="@if ($count_type3){{number_format(($count_type3/$count_document)*100,2)}}@endif "aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Orders</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="font-size:1rem;font-family: 'Athiti', sans-serif;">
                            ประเภท นศ
                          </th>
                          <th style="font-size:1rem;font-family: 'Athiti', sans-serif;">
                            จำนวนทั้งหมด
                          </th>
                          <th style="font-size:1rem;font-family: 'Athiti', sans-serif;">
                            ส่งเอกสารแล้ว
                          </th>
                          <th style="font-size:1rem;font-family: 'Athiti', sans-serif;">
                            ขาดส่งเอกสาร
                          </th>
                          <th class="w-50 text-center" style="font-size:1rem;font-family: 'Athiti', sans-serif;" colspan="2">
                            คิดเป็น
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="font-weight-medium">
                            กู้ยืมรายใหม่
                          </td>
                          <td class="text-center">
                            {{ !empty($count_type1) ? $count_type1 : 0 }}
                          </td>
                          <td class="text-center">
                            {{ !empty($count_type1_success) ? $count_type1_success : 0 }}
                          </td>
                          <td class="text-center">
                            {{ !empty($count_type1_success)&&!empty($count_type1) ? $count_type1-$count_type1_success : 0 }}
                          </td>
                          <td class="text-success">
                            {{ !empty($count_type1_success)&&!empty($count_type1) ? round(($count_type1_success/$count_type1)*100) : 0 }}%
                            <div class="progress">
                              <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: {{ !empty($count_type1_success)&&!empty($count_type1) ? ($count_type1_success/$count_type1)*100 : 0 }}%" aria-valuenow="{{ !empty($count_type1_success)&&!empty($count_type1) ? ($count_type1_success/$count_type1)*100 : 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="font-weight-medium">
                            กู้ยืมรายใหม่เลื่อนชั้นปี
                          </td>
                          <td class="text-center">
                              {{ !empty($count_type2) ? $count_type2 : 0 }}
                            </td>
                            <td class="text-center">
                              {{ !empty($count_type2_success) ? $count_type2_success : 0 }}
                            </td>
                            <td class="text-center">
                              {{ !empty($count_type2_success)&&!empty($count_type2) ? $count_type2-$count_type2_success : 0 }}
                            </td>
                            <td class="text-warning">
                              {{ !empty($count_type2_success)&&!empty($count_type2) ? round(($count_type2_success/$count_type2)*100) : 0 }}%
                              <div class="progress">
                                <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: {{ !empty($count_type2_success)&&!empty($count_type2) ? ($count_type2_success/$count_type2)*100 : 0 }}%" aria-valuenow="{{ !empty($count_type1_success)&&!empty($count_type1) ? ($count_type1_success/$count_type1)*100 : 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                        </tr>
                        <tr>
                          <td style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="font-weight-medium">
                            กู้ยืมรายเก่าชั้นปี 1
                          </td>
                          <td class="text-center">
                            {{ !empty($count_type3) ? $count_type3 : 0 }}
                          </td>
                          <td class="text-center">
                            {{ !empty($count_type3_success) ? $count_type3_success : 0 }}
                          </td>
                          <td class="text-center">
                            {{ !empty($count_type3_success)&&!empty($count_type3) ? $count_type3-$count_type3_success : 0 }}
                          </td>
                          <td class="text-danger">
                            {{ !empty($count_type3_success)&&!empty($count_type3) ? round(($count_type3_success/$count_type3)*100) : 0 }}%
                            <div class="progress">
                              <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: {{ !empty($count_type3_success)&&!empty($count_type3) ? ($count_type3_success/$count_type3)*100 : 0 }}%" aria-valuenow="{{ !empty($count_type1_success)&&!empty($count_type1) ? ($count_type1_success/$count_type1)*100 : 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
@section('scripts')
  <script src="{{asset('templateadmin/js/chart.js')}}"></script>
  @if (session()->has('msg_success'))
  <script>
    swal({
      title: "ยืนยันข้อมูล",
      text: "<?php echo session()->get('msg_success'); ?>",
      timer: 3000,
      type: 'success',
      icon: "success",
      showConfirmButton: false
    });
  </script>
  @elseif(session()->has('msg_error'))
  <script>
      swal({
        title: "เกิดข้อผิดพลาด",
        text: "<?php echo session()->get('msg_error'); ?>",
        timer: 3000,
        type: 'error',
        icon: "error",
        showConfirmButton: false
      });
  </script>
  @endif

  <script>
    startTime();
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
        h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
  </script>
@endsection
