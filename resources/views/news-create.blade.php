@extends('layouts.templateadmin')
@section('title','Create New')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 d-flex align-items-stretch">
      <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" style="font-size:1.25rem;font-family: 'Athiti', sans-serif;">สร้างข่าวใหม่</h4>
              <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="card-description">
                แบบฟอร์มสำหรับเพิ่มข่าว
              </p>
              {{ Form::open(array('route'=>'new-create-form','files'=>true))}}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-sm-2 col-form-label text-right">หัวข้อข่าว</label>
                      <div class="col-sm-8">
                      <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="text" class="form-control" name="head" placeholder="เพิ่มหัวข้อข่าว" value="{{session()->get('head')}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-sm-2 col-form-label text-right">รายระเอียดย่อย</label>
                      <div class="col-sm-8">
                      <input style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="text" class="form-control" name="title" placeholder="รายระเอียดย่อย" value="{{session()->get('title')}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-sm-2 col-form-label text-right">ประเภทนักศึกษาที่แจ้ง</label>
                      <div class="col-sm-8">
                        <select class="form-control" style="font-size:1rem;font-family: 'Athiti', sans-serif;" name="typestudent">
                          <option value="0">เลือกประเภท</option>
                          @foreach ($typestudent as $type)
                            <option @if (session()->get('typestudent')==$type->id)
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
                        <textarea style="font-size:1rem;font-family: 'Athiti', sans-serif;" name="body" class="form-control" id="exampleTextarea1" rows="15"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-sm-2 col-form-label text-right">ลิ้งค์ดาวน์โหลด</label>
                      <div class="col-sm-8">
                        <input name="link" style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="text" class="form-control" placeholder="url สำหรับโหลดเอกสาร">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                    <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-sm-2 col-form-label text-right">รูปภาพ</label>
                    <div class="col-sm-8">
                      <input name="image" type="file" accept=".jpg,.png">
                    </div>
                  </div>
                </div>
                <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="submit" class="btn btn-success mr-2">บันทึกข้อมูล</button>
                <a href="{{route('home')}}" style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="btn btn-warning">กลับหน้าหลัก</a>
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
  </script>
@endsection
