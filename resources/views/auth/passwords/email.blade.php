@extends('layouts.template')
@section('title',"Resetpassword Admin")

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
          <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
              <div class="col-lg-4 mx-auto">
                <div class="auto-form-wrapper">
                  <div class="row text-center">
                    <div class="col-md-12">
                    <img style="width: 40%;margin-bottom:20px;" src="{{asset('images/logo-rmutl-png-6.png')}}" alt="">
                    </div>
                    <div class="col-md-12">
                        @if (session('status'))
                            <div style="font-size:1.05rem;font-family: 'Athiti', sans-serif;" class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @else
                            <div style="font-size:1.05rem;font-family: 'Athiti', sans-serif;" class="alert alert-danger" role="alert">
                                !! mail's empty !!
                            </div>
                        @endif
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                  <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                      <label class="label">Email Reset</label>
                      <div class="input-group">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group text-center">
                        <span class="text-small font-weight-semibold">Develop with Laravel Framework 5.7</span>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary submit-btn btn-block">{{ __('Send Password Reset Link') }}</button>
                    </div>
                  </form>
                </div>
                <p style="margin-top:15px;" class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
