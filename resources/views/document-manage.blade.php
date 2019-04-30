@extends('layouts.templateadmin')
@section('title','Edit Document')
@section('stylesheet')
    <style>
        .form-group input[type="checkbox"] {
            display: none;
        }
        .form-group input[type="checkbox"] + .btn-group > label span {
            width: 20px;
        }
        .form-group input[type="checkbox"] + .btn-group > label span:first-child {
            display: none;
        }
        .form-group input[type="checkbox"] + .btn-group > label span:last-child {
            display: inline-block;
        }
        .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
            display: inline-block;
        }
        .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title row">
                    <p style="font-size:1.25rem;font-family: 'Athiti', sans-serif;" class="col-4">จัดการข้อมูลเอกสาร </p>
                    @if ($data->confrim)
                    <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-8 text-right"> <span style="color:green">ยืนยันข้อมูล โดย {{$data->getNameconfirm}} เวลายืนยัน {{$data->added_confrim}}</span> <a class="btn btn-outline-danger" style="font-size:1rem;font-family: 'Athiti', sans-serif;" href="javascript:void(0)" onclick="confirm({{ $data->idDoc }},0)">ยกเลิกการยืนยัน</a></p>
                    @else
                    <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="col-8 text-right"> <a class="btn btn-outline-success" style="font-size:1rem;font-family: 'Athiti', sans-serif;" href="javascript:void(0)" onclick="confirm({{ $data->idDoc }},1)">ยืนยันการดำเนินการ</a></p>
                    @endif
                  </h4>
                  <table class="table table-hover" style="margin-bottom:25px;">
                        <thead>
                          <tr>
                            <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">ชื่อ-สกุล</th>
                            <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">รหัสนักศึกษา</th>
                            <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">รหัสประจำตัวประชาชน</th>
                            <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">เลขที่สัญญา</th>
                            <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">สถานนะดำเนินการ</th>
                          </tr>
                        </thead>
                        <tbody>
                            <td style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">{{$data->name}}</td>
                            <td style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">{{$data->stdId}}</td>
                            <td style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">{{$data->peopleId}}</td>
                            <td style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">{{$data->estdId}}</td>
                            <td>
                                @if ($data->confrim)
                                    <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="button" class="btn btn-outline-success">ดำเนินการเสร็จสิ้น</button>
                                @else
                                    <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="button" class="btn btn-outline-warning">กำลังดำเนินการ</button>
                                @endif
                            </td>
                        </tbody>
                  </table>
                    {{ Form::open(array('route'=>'document-edit-form')) }}
                      <input type="hidden" name="id" value="{{ $data->idDoc }}">
                      <div class="form-group row">
                            <label style="font-size:1.05rem;font-family: 'Athiti', sans-serif;" class="col-sm-3 col-form-label text-right">เลขที่สัญญา</label>
                            <div class="col-sm-8">
                              <input style="font-size:1.05rem;font-family: 'Athiti', sans-serif;" name="estdId" type="text" class="form-control" placeholder="เลขที่สัญญา" 
                               @if (Auth::user()->id!=1)   
                                    @if ($data->estdId)
                                        disabled
                                    @endif
                               @endif value="{{$data->estdId}}">
                            </div>
                          </div>
                      <div class="form-group row">
                        <label style="font-size:1.05rem;font-family: 'Athiti', sans-serif;" class="col-sm-3 col-form-label text-right">ประเภทนักศึกษา</label>
                        <div class="col-sm-8">
                            <select @if (Auth::user()->id!=1)
                                    disabled
                            @endif  name="typestudent" style="font-size:1.05rem;font-family: 'Athiti', sans-serif;" class="form-control">
                                @foreach ($typestudent as $type)
                                @if ($type->id!=4)
                                 <option @if ($type->id==$data->typestudent)
                                     selected=""
                                 @endif value="{{$type->id}}">{{$type->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="[ form-group ] row">
                          <div class="col-4 offset-md-1">
                            <input type="checkbox" value="1" name="doc1" id="fancy-checkbox-doc1" autocomplete="off"  @if ($data->doc1)
                            checked
                        @endif/>
                            <div style="border-style: none;" class="[ btn-group ]" >
                                <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" for="fancy-checkbox-doc1" class="[ btn btn-primary ]">
                                        <span class="fa fa-check"></span>
                                        <span class="fa fa-times"> </span>
                                </label>
                                <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" for="fancy-checkbox-primary" class="[ btn btn-default active ]">
                                        แบบคำขอกู้ยืมเงินกองทุนกู้ยืมเพื่อการศึกษา
                                </label>
                            </div>
                         </div>
                         <div class="col-6 offset-md-1">
                         <p style="font-size:1rem;font-family: 'Athiti', sans-serif;color:green;">
                            @if ($data->doc1)
                                รับเอกสารโดบ {{$data->getName1}} เวลา {{$data->added_doc1}}
                            @endif
                         </p>
                         </div>
                      </div>
                      <div class="[ form-group ] row">
                         <div class="col-4 offset-md-1">
                            <input type="checkbox" value="1" name="doc2" id="fancy-checkbox-doc2" autocomplete="off" @if ($data->doc2)
                                checked
                            @endif/>
                            <div style="border-style: none;" class="[ btn-group ]" >
                                <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" for="fancy-checkbox-doc2" class="[ btn btn-primary ]">
                                        <span class="fa fa-check"></span>
                                        <span class="fa fa-times"> </span>
                                </label>
                                <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" for="fancy-checkbox-primary" class="[ btn btn-default active ]">
                                        ยืนยันแบบคำขอกู้ยืมเงินกองทุนกู้ยืมเพื่อการศึกษา
                                </label>
                            </div>
                        </div>
                        <div class="col-6 offset-md-1">
                           <p style="font-size:1rem;font-family: 'Athiti', sans-serif;color:green;">
                                @if ($data->doc2)
                                    รับเอกสารโดบ {{$data->getName2}} เวลา {{$data->added_doc2}}
                                @endif
                            </p>
                        </div>
                      </div>
                      <div class="[ form-group ] row">
                         <div class="col-4 offset-md-1">
                            <input type="checkbox" value="1" name="doc3" id="fancy-checkbox-doc3" autocomplete="off"  @if ($data->doc3)
                            checked
                        @endif/>
                            <div style="border-style: none;" class="[ btn-group ]" >
                                <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" for="fancy-checkbox-doc3" class="[ btn btn-primary ]">
                                        <span class="fa fa-check"></span>
                                        <span class="fa fa-times"> </span>
                                </label>
                                <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" for="fancy-checkbox-primary" class="[ btn btn-default active ]">
                                        ยืนยันค่าเล่าเรียน
                                </label>
                            </div>
                        </div>
                        <div class="col-6 offset-md-1">
                           <p style="font-size:1rem;font-family: 'Athiti', sans-serif;color:green;">
                                @if ($data->doc3)
                                    รับเอกสารโดบ {{$data->getName3}} เวลา {{$data->added_doc3}}
                                @endif
                           </p>
                        </div>
                      </div>
                      <div class="row" style="margin-top:25px;">
                            <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="submit" class="btn btn-success mr-2">บันทึกข้อมูล</button>
                            <a href="{{route('admin-searchdocument')}}" style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="btn btn-warning">กลับหน้าค้นหา</a>
                      </div>
                    {{ Form::close() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div> 
@endsection
@section('scripts')
  <script>
    function confirm(idDoc,status){
      swal({
        title: "ต้องการเปลี่ยนยืนยันสถานะ?",
        text: "คุณต้องการเปลี่ยนสถานะการยืนยันสถานะจริงหรือไม่ !",
        icon: "warning",
        buttons: ['ยกเลิก','ตกลง'],
        dangerMode: false,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("ยืนยันการเปลี่ยนแปลงสถานะ", {
            icon: "success",
            timer: 3000,
            buttons: false,
          }).then( res => {
            
            window.location.href='/document-edit-confrim?id='+idDoc+'&status='+status;
          });
        } else {
          swal({
            title: "ยกเลิกการเปลี่ยนสถานะ",
            text: "ยกเลิกการเปลี่ยนสถานะแล้ว สถานะไม่มีการเปลี่ยนแปลง",
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
