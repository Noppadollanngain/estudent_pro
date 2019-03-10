@extends('layouts.templateadmin')
@section('title','News List')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p style="font-size:1.25rem;font-family: 'Athiti', sans-serif;" class="card-title">รายการข่าวทั้งหมด</p>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">วันที่สร้าง</th>
                    <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">หัวเรื่อง</th>
                    <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">อัพเดทเมื่อ</th>
                    <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">ส่งแจ้งเตือนเมื่อ</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                    <tr onclick="gotoEdit({{$item->id}})">
                        <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->created_at}}</td>
                        <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->head}}</td>
                        <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->updated_at}}</td>
                        <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->send_add}}</td>
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
      function gotoEdit(id){
        window.location.href = '{{asset("/new-edit?id=")}}'+id;
      }
  </script>
@endsection
