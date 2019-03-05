@extends('layouts.templateadmin')
@section('title','Edit Student')

@section('content')
<div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" style="font-size:1.25rem;font-family: 'Athiti', sans-serif;">แก้ไขข้อมูลนักศึกษา</h4>
                {{ Form::open(array('route'=>'student-edit-form')) }}
                  @if (!empty($data->whoIsupdate))
                      <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="card-description">
                        แก้ไขล่าสุด โดย {{$data->whoIsupdatename}} เวลาอัพเดท {{$data->updated_at}}
                      </p>
                  @endif
                  <input name="id" type="hidden" value="{{$data->id}}">
                  <div class="form-group">
                    <label style="font-size:1rem;font-family: 'Athiti', sans-serif;">ชื่อ-สกุล</label>
                  <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="text" class="form-control" value="{{$data->name}}" name="name">
                  </div>
                  <div class="form-group">
                        <label style="font-size:1rem;font-family: 'Athiti', sans-serif;">รหัสนักศึกษา</label>
                        <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="text" class="form-control" value="{{$data->stdId}}" name="stdId" disabled>
                  </div>
                  <div class="form-group">
                        <label style="font-size:1rem;font-family: 'Athiti', sans-serif;">รหัสประจำตัวประชาชน</label>
                        <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="text" class="form-control" value="{{$data->peopleId}}" name="peopleId" disabled>
                  </div>
                  <div class="form-group">
                        <label style="font-size:1rem;font-family: 'Athiti', sans-serif;">สาขาปัจจุบัน</label>
                        <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="text" class="form-control" value="{{$data->major}}" name="major" disabled>
                  </div>

                  <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="submit" class="btn btn-success mr-2">บันทึกข้อมูล</button>
                  <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="btn btn-warning">ยกเลิก</button>
                {{ Form::close() }}
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

  <script>
    function gotoEdit(id){
      window.location.href = '{{asset("/student-edit")}}/'+id;
    }
  </script>
@endsection
