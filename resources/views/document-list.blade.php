@extends('layouts.templateadmin')
@section('title','Resultesearch Student')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p style="font-size:1.25rem;font-family: 'Athiti', sans-serif;" class="card-title">ผลลัพธ์การค้นหา นักศึกษา</p>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">รหัสนักศึกษา</th>
                    <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">รหัสประจำตัวประชาชน</th>
                    <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">ชื่อ-สกุล</th>
                    <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">สถานะเอกสาร</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                   @if ($item->docStatus)
                        <tr onclick="gotoEditdocument({{$item->id}})">
                   @else
                        <tr onclick="gotoCreatedocument({{$item->id}})">
                   @endif
                        <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->stdId}}</td>
                        <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->peopleId}}</td>
                        <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->name}}</td>
                        <td>
                            @if ($item->docStatus)
                                @if ($item->confrim)
                                 <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="button" class="btn btn-outline-success">ดำเนินการเสร็จสิ้น</button>
                                @else
                                 <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="button" class="btn btn-outline-warning">กำลังดำเนินการ</button>
                                @endif
                            @else
                                <button style="font-size:1rem;font-family: 'Athiti', sans-serif;" type="button" class="btn btn-outline-danger">สร้างรายการเอกสารใหม่</button>
                            @endif    
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
                {!! $data->render() !!}
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
    function gotoEditdocument(id){
      window.location.href = '{{asset("/document-edit?id=")}}'+id;
    }
    function gotoCreatedocument(id){
      window.location.href = '{{asset("/document-create?id=")}}'+id;
    }
  </script>
@endsection
