@extends('layouts.templateadmin')
@section('title','Search Student')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 d-flex align-items-stretch">
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" style="font-size:1.25rem;font-family: 'Athiti', sans-serif;">ค้นหารายชื่อนักศึกษา</h4>
                <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="card-description">
                  ระบุคำที่ต้องการค้นหา
                </p>
                <div class="form-group">
                  <label style="font-size:1rem;font-family: 'Athiti', sans-serif;">ค้นหาจากชื่อนักศึกษา</label>
                  {!! Form::open(array('route'=>'student-searchBy','method' => 'get')) !!}
                    <div class="input-group">
                        <input type="hidden" name="typesearch" value="1">
                        <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" name="data" type="text" class="form-control" placeholder="รายชื่อนักศึกษา" aria-label="Username" aria-describedby="colored-addon3" minlength="3" required>
                        <div class="input-group-append bg-primary border-primary">
                        <button type="submit" class="input-group-text bg-transparent">
                            <i style="color:#FFF" class="fa fa-search"></i>
                        </button>
                        </div>
                    </div>
                  {!! Form::close() !!}
                </div>
                <div class="form-group">
                    <label style="font-size:1rem;font-family: 'Athiti', sans-serif;">ค้นหาจากรหัสนักศึกษา</label>
                    {!! Form::open(array('route'=>'student-searchBy','method' => 'get')) !!}
                        <div class="input-group">
                            <input type="hidden" name="typesearch" value="2">
                            <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" minlength="3" name="data" type="text" class="form-control" placeholder="รหัสนักศึกษา" aria-label="Username" aria-describedby="colored-addon3" required>
                            <div class="input-group-append bg-primary border-primary">
                              <button type="submit" class="input-group-text bg-transparent">
                                  <i style="color:#FFF" class="fa fa-search"></i>
                              </button>
                            </div>
                          </div>
                    {!! Form::close() !!}
                </div>
                <div class="form-group">
                    <label style="font-size:1rem;font-family: 'Athiti', sans-serif;">ค้นหาจากรหัสบัตรประชาชน</label>
                    {!! Form::open(array('route'=>'student-searchBy','method' => 'get')) !!}
                        <div class="input-group">
                            <input type="hidden" name="typesearch" value="3">
                            <input minlength="3" style="font-size:1rem;font-family: 'Athiti', sans-serif;" name="data" type="text" class="form-control" placeholder="รหัสบัตรประชาชน" aria-label="Username" aria-describedby="colored-addon3" required>
                            <div class="input-group-append bg-primary border-primary">
                                <button type="submit" class="input-group-text bg-transparent">
                                    <i style="color:#FFF" class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
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
@endsection
