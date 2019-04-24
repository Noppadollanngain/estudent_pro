@extends('layouts.template')
@section('title',"Resetpassword Admin set")

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
                  </div>
                  <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                      <label class="label">Email Reset</label>
                      <div class="input-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
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
                        <label class="label">{{ __('Password') }}</label>
                        <div class="input-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
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
                        <label class="label">{{ __('Confirm Password') }}</label>
                        <div class="input-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
