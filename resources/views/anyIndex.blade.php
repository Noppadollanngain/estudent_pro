@extends('layouts.templateadmin')
@section('title','Anyfunction Admin')
@section('stylesheet')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <style>
    .toggle.android { border-radius: 0px;}
    .toggle.android .toggle-handle { border-radius: 0px; }
  </style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="card border-primary col-12">
        <div class="offset-md-8 col-md-4 mt-3">
          <div class="custom-control custom-switch">
            <input id="toggle-event" type="checkbox" data-toggle="toggle" data-style="android" data-onstyle="info">
            <label>กดเพื่อเปิดใช้งาน function</label>
          </div>
        </div>
      </div>
      <div class="card border-primary col-12">
        <div class="card-body">
          <h4 style="font-size:1.05rem;font-family: 'Athiti', sans-serif;" class="card-title">สำหรับแจ้งเตือนนักศึกษากู้ยืมขาดส่งเอกสาร</h4>
          <a id="alertDoc" href="{{ route('any-alertdoc') }}" style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="btn btn-warning mb-2 disabled">แจ้งเตือนนักศึกษา</a> 
          <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="card-text">กดปุ่มเพื่อทำการแจ้งไปยังนักศึกษาขาดส่งเอกสาร</p>
        </div>
        <div class="card-body">
          <h4 style="font-size:1.05rem;font-family: 'Athiti', sans-serif;" class="card-title">รีเซทเอกสารประจำภาคเรียน</h4>
          <a id="resetDoc" href="{{ route('any-reset') }}" style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="btn btn-danger mb-2 disabled">รีเซทเอกสารนักศึกษา</a> 
          <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="card-text">กดปุ่มเพื่อทำการรีเซทระบบเอกสารใหม่</p>
        </div>
        <div class="card-body">
          <h4 style="font-size:1.05rem;font-family: 'Athiti', sans-serif;" class="card-title">เลื่อนระดับชั้นนักศึกษากู้ยืม</h4>
          <a id="updateDoc" href="{{ route('any-update') }}" style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="btn btn-success mb-2 disabled">เลื่อนชั้นนักศึกษา</a> 
          <p style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="card-text">กดปุ่มเพื่อทำการเลื่อนชั้นนักศึกษากู้ยืม</p>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
  $(function() {
    $('#toggle-event').change(function() {
      if($(this).prop('checked')){
        $('#alertDoc').removeClass('disabled');
        $('#resetDoc').removeClass('disabled');
        $('#updateDoc').removeClass('disabled');
      }else{
        $('#alertDoc').addClass('disabled');
        $('#resetDoc').addClass('disabled');
        $('#updateDoc').addClass('disabled');
      }
    })
  })
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