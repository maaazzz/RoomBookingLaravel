@extends('front-end.layouts.master')
@section('title','Booking | Login')
@section('content')
<div class="container-fluid px-3">
    <div class="row min-vh-100 ">
      <div class="col-md-8 col-lg-6 col-xl-5 d-flex align-items-center">
        <div class="w-100 py-5 px-md-5 px-xl-6 position-relative">
          <div class="mb-5"><img class="img-fluid mb-3" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/logo-square.svg" alt="..." style="max-width: 4rem;">
            <h2>Welcome back</h2>
          </div>
          <form class="form-validate" action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
              <label class="form-label" for="loginUsername"> Email Address</label>
              <input class="form-control" name="email" id="loginUsername" type="email" placeholder="name@address.com" autocomplete="off" required data-msg="Please enter your email">
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror
            </div>
            <div class="form-group mb-4">
              <div class="row">
                <div class="col">
                  <label class="form-label" for="loginPassword"> Password</label>
                </div>
                <div class="col-auto"><a class="form-text small" href="#">Forgot password?</a></div>
              </div>
              <input class="form-control" name="password" id="loginPassword" placeholder="Password" type="password" required data-msg="Please enter your password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group mb-4">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" name="remember" id="loginRemember" type="checkbox">
              </div>
            </div>
            <!-- Submit-->
            <button class="btn btn-lg btn-block btn-warning" type="submit">Sign in</button>

            <hr class="my-3 hr-text letter-spacing-2" data-content="OR">
            <p class="text-center"><small class="text-muted text-center">Don't have an account yet? <a href="{{ route('register') }}">Sign Up                </a></small></p>

          </form><a class="close-absolute mr-md-5 mr-xl-6 pt-5" href="index-2.html">
            <svg class="svg-icon w-3rem h-3rem">
              <use xlink:href="#close-1"> </use>
            </svg></a>
        </div>
      </div>
      <div class="col-md-4 col-lg-6 col-xl-7 d-none d-md-block">
        <!-- Image-->
        <div class="bg-cover h-100 mr-n3" style="background-image: url(../../../d19m59y37dris4.cloudfront.net/directory/1-6-1/img/photo/photo-1497436072909-60f360e1d4b1.jpg);"></div>
      </div>
    </div>
  </div>
@endsection
