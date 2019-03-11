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
                    <p style="font-size:1rem;" class="mb-0 text-right">จำนวนนักศึกษาในระบบ</p>
                    <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">{{number_format($count_student)}}</h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> จำนวนทั้งหมด
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
                    <p style="font-size:1rem;" class="mb-0 text-right">จำนวนเอกสารในระบบ</p>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0">{{number_format($count_document)}}</h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> เคยรับเอกสาร
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
                    <p style="font-size:1rem;" class="mb-0 text-right">จำนวนส่งเอกสารครบ</p>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0">{{number_format($count_success)}}</h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> จากจำนวนเอกสาร
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
                    <p style="font-size:1rem;" class="mb-0 text-right">ขาดส่งเอกสาร</p>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0">{{number_format($count_error)}}</h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> จากจำนวนเอกสาร
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
                    <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="mb-2 text-primary">{{number_format(($count_type1/$count_document)*100,2)}}%</p>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{($count_type1/$count_document)*100}}%" aria-valuenow="{{($count_type1/$count_document)*100}}"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="wrapper mt-4">
                  <div class="d-flex justify-content-between">
                    <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="mb-2">รายใหม่เลื่อนชั้นปี จำนวน {{number_format($count_type2)}}</p>
                    <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="mb-2 text-success">{{number_format(($count_type2/$count_document)*100,2)}}%</p>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{($count_type2/$count_document)*100}}%" aria-valuenow="{{($count_type2/$count_document)*100}}"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="wrapper mt-4">
                  <div class="d-flex justify-content-between">
                    <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="mb-2">รายเก่า จำนวน {{number_format($count_type3)}}</p>
                    <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="mb-2 text-success">{{number_format(($count_type3/$count_document)*100,2)}}%</p>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{($count_type3/$count_document)*100}}%" aria-valuenow="{{($count_type3/$count_document)*100}}"
                      aria-valuemin="0" aria-valuemax="100"></div>
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
                          <th>
                            #
                          </th>
                          <th>
                            First name
                          </th>
                          <th>
                            Progress
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Sales
                          </th>
                          <th>
                            Deadline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="font-weight-medium">
                            1
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td class="text-danger"> 53.64%
                            <i class="mdi mdi-arrow-down"></i>
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-medium">
                            2
                          </td>
                          <td>
                            Messsy Adam
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $245.30
                          </td>
                          <td class="text-success"> 24.56%
                            <i class="mdi mdi-arrow-up"></i>
                          </td>
                          <td>
                            July 1, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-medium">
                            3
                          </td>
                          <td>
                            John Richards
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $138.00
                          </td>
                          <td class="text-danger"> 28.76%
                            <i class="mdi mdi-arrow-down"></i>
                          </td>
                          <td>
                            Apr 12, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-medium">
                            4
                          </td>
                          <td>
                            Peter Meggik
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td class="text-danger"> 53.45%
                            <i class="mdi mdi-arrow-down"></i>
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-medium">
                            5
                          </td>
                          <td>
                            Edward
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 160.25
                          </td>
                          <td class="text-success"> 18.32%
                            <i class="mdi mdi-arrow-up"></i>
                          </td>
                          <td>
                            May 03, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-medium">
                            6
                          </td>
                          <td>
                            Henry Tom
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 150.00
                          </td>
                          <td class="text-danger"> 24.67%
                            <i class="mdi mdi-arrow-down"></i>
                          </td>
                          <td>
                            June 16, 2015
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
