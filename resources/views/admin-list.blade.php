@extends('layouts.templateadmin')
@section('title','Dashborad Admin')

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
                            <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->name}}</td>
                            <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->email}}</td>
                            <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->created_at}}</td>
                            <td>
                                @if (Auth::user()->id==1)
                                <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="badge badge-danger">ลบออกจากระบบ</label>
                                @else
                                    <label style="font-size:1rem;font-family: 'Athiti', sans-serif;" class="badge badge-success">ใช้งานได้</label>
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
