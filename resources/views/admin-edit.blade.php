@extends('layouts.templateadmin')
@section('title','Edit Admin')
@section('stylesheet')
  <style>
    .badge a{
      color: #FFFFFF;
      text-decoration: none;
    }
    .badge a:hover{
      color: #DCDCDC;
    }

  </style>
@endsection

@section('content')
@if ($data->id!=1&&(Auth::user()->id==1||Auth::user()->id==$data->id))
    <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <h4 style="font-size:1.25rem;font-family: 'Athiti', sans-serif;" class="card-title">แก้ไขข้อมูล</h4>
                    {{ Form::open(array('route'=>'admin-edit-form'))}}
                      <input type="hidden" name="id" value="{{ $data->id }}">
                      <div class="form-group">
                        <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" for="exampleInputEmail1">Email address</label>
                        <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $data->email }}" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" for="exampleInputPassword1">ชื่อ-สกุล</label>
                        <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{ $data->name  }}" placeholder="Name">
                      </div>
                      <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="submit" class="btn btn-success mr-2">ยืนยันข้อมูล</button>
                      @if (Auth::user()->id==1)
                        <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="button" class="btn btn-warning"><a style="color: #FFFFFF;text-decoration: none;" href="{{route('admin-list')}}">ยกเลิก</a></button>
                      @else
                        <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="button" class="btn btn-warning"><a style="color: #FFFFFF;text-decoration: none;" href="{{route('home')}}">ยกเลิก</a></button>
                      @endif
                    {{ Form::close() }}
                  </div>
                </div>
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
