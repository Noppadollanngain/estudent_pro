@extends('layouts.templateadmin')
@section('title',"register Admin")

@section('content')
@if (Auth::user()->id==1)
    <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <div class="input-group">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Firstname Lastname">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        @if ($errors->has('name'))
                            <i style="color:red" class="mdi mdi-check-circle-outline"></i>
                        @else
                            <i class="mdi mdi-check-circle-outline"></i>
                        @endif
                      </span>
                    </div>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="E-mail">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            @if ($errors->has('email'))
                                <i style="color:red" class="mdi mdi-check-circle-outline"></i>
                            @else
                                <i class="mdi mdi-check-circle-outline"></i>
                            @endif
                          </span>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                    <div class="input-group-append">
                            <span class="input-group-text">
                              @if ($errors->has('password'))
                                  <i style="color:red" class="mdi mdi-check-circle-outline"></i>
                              @else
                                  <i class="mdi mdi-check-circle-outline"></i>
                              @endif
                            </span>
                          </div>
                          @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary submit-btn btn-block">Register</button>
                </div>
                <div class="text-block text-center my-3">
                  <span  style="font-size:1rem;" class="text-small font-weight-semibold">เพิ่มเจ้าหน้าที่ใหม่เข้าสู่ระบบ</span>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
@else
<div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
    <div class="row flex-grow">
          <div class="col-lg-7 mx-auto text-white">
            <div class="row align-items-center d-flex flex-row">
              <div class="col-lg-6 text-lg-right pr-lg-4">
                <h1 class="display-1 mb-0">404</h1>
              </div>
              <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                <h2>SORRY!</h2>
                <h3 class="font-weight-light">The page you’re looking for was not found.</h3>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 text-center mt-xl-2">
                <a class="text-white font-weight-medium" href="{{route('home')}}">Back to home</a>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 mt-xl-2">
                <p class="text-white font-weight-medium text-center">Copyright &copy; 2018 All rights reserved.</p>
              </div>
            </div>
          </div>
        </div>
    </div>
@endif
@endsection
