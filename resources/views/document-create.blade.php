@extends('layouts.templateadmin')
@section('title','Create Document')
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
                            <td style="font-size:1.05rem;font-family: 'Athiti', sans-serif;"></td>
                            <td>
                                <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="button" class="btn btn-outline-warning">สร้างเอกสารใหม่</button>
                            </td>
                        </tbody>
                  </table>
                    {{ Form::open(array('route'=>'document-create-form')) }}
                     <input type="hidden" name="id" value="{{$data->id}}">
                     <div class="form-group row">
                        <label style="font-size:1.05rem;font-family: 'Athiti', sans-serif;" class="col-sm-3 col-form-label text-right">เลขที่สัญญา</label>
                        <div class="col-sm-8">
                          <input style="font-size:1.05rem;font-family: 'Athiti', sans-serif;" name="estdId" type="text" class="form-control" placeholder="เลขที่สัญญา">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label style="font-size:1.05rem;font-family: 'Athiti', sans-serif;" class="col-sm-3 col-form-label text-right">ประเภทนักศึกษา</label>
                        <div class="col-sm-8">
                            <select name="typestudent" style="font-size:1.05rem;font-family: 'Athiti', sans-serif;" class="form-control">
                                 <option value="">เลือกประเภท</option>
                                @foreach ($typestudent as $type)
                                  @if ($type->id!=4 && $type->id!=5)
                                      <option value="{{$type->id}}">{{$type->name}}</option>
                                  @endif
                                @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="[ form-group ] row">
                          <div class="col-4 offset-md-1">
                            <input type="checkbox" value="1" name="doc1" id="fancy-checkbox-doc1" autocomplete="off" />
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
                         </div>
                      </div>
                      <div class="[ form-group ] row">
                         <div class="col-4 offset-md-1">
                            <input type="checkbox" value="1" name="doc2" id="fancy-checkbox-doc2" autocomplete="off" />
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
                          
                        </div>
                      </div>
                      <div class="[ form-group ] row">
                         <div class="col-4 offset-md-1">
                            <input type="checkbox" value="1" name="doc3" id="fancy-checkbox-doc3" autocomplete="off"  />
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
                           
                        </div>
                      </div>
                      <div class="[ form-group ] row">
                        <div class="col-4 offset-md-1">
                           <input type="checkbox" value="1" name="doc4" id="fancy-checkbox-doc4" autocomplete="off"  />
                           <div style="border-style: none;" class="[ btn-group ]" >
                               <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" for="fancy-checkbox-doc4" class="[ btn btn-primary ]">
                                       <span class="fa fa-check"></span>
                                       <span class="fa fa-times"> </span>
                               </label>
                               <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" for="fancy-checkbox-primary" class="[ btn btn-default active ]">
                                      รับเอกสารสัญญากู้ยืนคืน
                               </label>
                           </div>
                       </div>
                       <div class="col-6 offset-md-1">
                          
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
