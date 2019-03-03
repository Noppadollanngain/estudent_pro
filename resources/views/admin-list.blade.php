@extends('layouts.templateadmin')
@section('title','List Admin')
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
    <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p style="font-size:1.25rem;font-family: 'Athiti', sans-serif;" class="card-title">รายชื่อเจ้าหน้าที่ในระบบ</p>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">ชื่อเจ้าหน้าที่</th>
                        <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">E-mail</th>
                        <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">วันที่เข้าสู่ระบบ</th>
                        <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">สถานะ</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $item)
                        <tr>
                            <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">
                              @if (Auth::user()->id==1)
                            <a href="{{route('admin-edit',['id'=>$item->id])}}">{{$item->name}}</a> 
                              @else
                               {{$item->name}}
                              @endif
                            </td>
                            <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->email}}</td>
                            <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->created_at}}</td>
                            <td>
                                @if (Auth::user()->id==1)
                                    @if ($item->status)
                                      <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="badge badge-warning"><a href="{{route('admin-unblock',['id'=>$item->id])}}">ปลดล็อคการใช้งานจากระบบ</a></label>
                                    @else
                                      <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="badge badge-danger"><a href="{{route('admin-block',['id'=>$item->id])}}">ล็อคการใช้งานจากระบบ</a></label>
                                    @endif
                                @else
                                  @if ($item->status)
                                    <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="badge badge-danger">ห้ามใช้งาน</label>
                                  @else
                                    <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="badge badge-success">ใช้งานได้</label>
                                  @endif
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
@endsection
