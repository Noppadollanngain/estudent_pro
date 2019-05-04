@extends('layouts.templateadmin')
@section('title','Insert Database Admin')

@section('content')
@if (Auth::user()->id==1)
    <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" style="font-size:1.25rem;font-family: 'Athiti', sans-serif;">เพิ่มข้อมูล</h4>
                <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="card-description">
                  เพิ่มข้อมูล นัศศึกษากู้ยืมกองทุนเพื่อการศึกษา
                </p>
                {!! Form::open(array('route'=>'admin-insertdatabase-form','files' => true)) !!}
                  <div class="form-group">
                    <label style="font-size:1rem;font-family: 'Athiti', sans-serif;">File upload</label><br>
                    <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="file" name="excel" accept=".xlsx">
                  </div>
                  <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="submit" class="btn btn-success mr-2">เพิ่มข้อมูล</button>
                  <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="button" class="btn btn-warning"><a style="color: #FFFFFF;text-decoration: none;" href="{{route('home')}}">ยกเลิก</a></button>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" style="font-size:1.25rem;font-family: 'Athiti', sans-serif;">เพิ่มข้อมูล รายเก่า</h4>
                <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="card-description">
                  หมายเลขสัญญากู้ยืมของนักศึกษากองทุนกู้ยืม
                </p>
                {!! Form::open(array('route'=>'admin-insertdocument-form','files' => true)) !!}
                  <input type="hidden" name="typestudent" value="3">
                  <div class="form-group">
                    <label style="font-size:1rem;font-family: 'Athiti', sans-serif;">File upload</label><br>
                    <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="file" name="excel" accept=".xlsx">
                  </div>
                  <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="submit" class="btn btn-success mr-2">เพิ่มข้อมูล</button>
                  <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="button" class="btn btn-warning"><a style="color: #FFFFFF;text-decoration: none;" href="{{route('home')}}">ยกเลิก</a></button>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" style="font-size:1.25rem;font-family: 'Athiti', sans-serif;">เพิ่มข้อมูล รายใหม่เลื่อนชั้นปี</h4>
                <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="card-description">
                  หมายเลขสัญญากู้ยืมของนักศึกษากองทุนกู้ยืม
                </p>
                {!! Form::open(array('route'=>'admin-insertdocument-form','files' => true)) !!}
                  <input type="hidden" name="typestudent" value="2">
                  <div class="form-group">
                    <label style="font-size:1rem;font-family: 'Athiti', sans-serif;">File upload</label><br>
                    <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="file" name="excel" accept=".xlsx">
                  </div>
                  <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="submit" class="btn btn-success mr-2">เพิ่มข้อมูล</button>
                  <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="button" class="btn btn-warning"><a style="color: #FFFFFF;text-decoration: none;" href="{{route('home')}}">ยกเลิก</a></button>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
    </div>
@else
   @include('layouts.inc-403')
@endif
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
