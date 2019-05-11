@extends('layouts.templateadmin')
@section('title','Edit New')
@section('stylesheet')
    <style>
        .image-new{
            height: 300px;
            width: 300px;
            border-radius: 3px;
            margin-left: 32%;
        }
    </style>
@endsection
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 d-flex align-items-stretch">
      <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                    <h4 class="card-title row">
                        <p style="font-size:1.25rem;font-family: 'Athiti', sans-serif;" class="col-4">แก้ไขข่าว </p>
                        @if ($data->adminsend)
                        <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-8 text-right"> <span style="color:green">แจ้งข้อความข่าวล่าสุด โดย {{$data->whosend}} เวลายืนยัน {{$data->send_add}}</span></p>
                        @endif
                    </h4>
              <img class="image-new" src="{{asset('/images/News/'.$data->image)}}" alt="">
              <p style="font-size:1rem;font-family: 'Athiti', sans-serif;margin-top:15px;" class="card-description">
                แบบฟอร์มสำหรับแก้ไขข่าว <span style="color:red"> สร้างโดย {{$data->whocreate}} เวลา {{$data->created_at}}</span>
              </p>
              {{ Form::open(array('route'=>'new-edit-form','files'=>true))}}
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-sm-2 col-form-label text-right">หัวข้อข่าว</label>
                      <div class="col-sm-8">
                      <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="text" class="form-control" name="head" placeholder="เพิ่มหัวข้อข่าว" value="{{$data->head}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-sm-2 col-form-label text-right">รายระเอียดย่อย</label>
                      <div class="col-sm-8">
                      <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="text" class="form-control" name="title" placeholder="รายระเอียดย่อย" value="{{$data->title}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-sm-2 col-form-label text-right">ประเภทนักศึกษาที่แจ้ง</label>
                      <div class="col-sm-8">
                        <select class="form-control" style="font-size:1rem;font-family: 'Athiti', sans-serif;" name="typestudent">
                          @foreach ($typestudent as $type)
                            <option @if ($data->typestudent==$type->id)
                              selected=""
                             @endif value="{{$type->id}}">{{$type->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-sm-2 col-form-label text-right">ข้อความข่าว</label>
                      <div class="col-sm-8">
                      <textarea style="font-size:1rem;font-family: 'Athiti', sans-serif;" name="body" class="form-control" id="exampleTextarea1" rows="15">{{$data->body}}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-sm-2 col-form-label text-right">ลิ้งค์ดาวน์โหลด</label>
                      <div class="col-sm-8">
                      <input name="link" style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="text" class="form-control" placeholder="url สำหรับโหลดเอกสาร" value="{{$data->linkdownload}}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                    <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-sm-2 col-form-label text-right">รูปภาพ</label>
                    <div class="col-sm-4">
                      <input name="image" type="file" accept=".jpg,.png">
                    </div>
                  </div>
                </div>
                @if ($data->whoupdate)
                  <p style="font-size:1rem;color:green">แก้ไขล่าสุดโดย {{$data->whoupdate}} เวลา {{$data->updated_at}}</p>
                @endif
                <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="submit" class="btn btn-success mr-2">บันทึกข้อมูล</button>
                
                <a href="{{route('new-list')}}" style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="btn btn-warning">กลับหน้ารายการ</a>
                <a href="{{route('new-send',[ 'id' => $data->id])}}" style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="btn btn-info">แจ้งข่าวสาร</a>
                <a href="javascript:void(0)" onclick="deleteNew({{ $data->id }})" style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="btn btn-danger">ลบข่าว</a>
              {{Form::close()}}
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

  <script>
    function gotoEdit(id){
      window.location.href = '{{asset("/student-edit")}}/'+id;
    }
    function deleteNew(id){
      swal({
        title: "ต้องการเปลี่ยนยืนยันสถานะ?",
        text: "คุณต้องการลบข่าวสารนี้จริงหรือไม่ !",
        icon: "warning",
        buttons: ['ยกเลิก','ตกลง'],
        dangerMode: false,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("ยืนยันการการลบข้อมูล", {
            icon: "success",
            timer: 3000,
            buttons: false,
          }).then( res => {
            window.location.href='/delete-news?id='+id;
          });
        } else {
          swal({
            title: "ยกเลิกการลบข้อมูล",
            text: "ยกเลิกการลบข่าวสารแล้ว",
            timer: 3000,
            type: 'warning',
            icon: "warning",
            buttons: false,
            showConfirmButton: false
          });
        }
      });
    }
  </script>
@endsection
