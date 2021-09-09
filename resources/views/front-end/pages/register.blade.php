@extends('front-end.layouts.master')
@section('title','Booking | Register')
@section('content')
<div class="container-fluid px-3">
    <div class="row min-vh-100 ">
      <div class="col-md-8 col-lg-6 col-xl-5 d-flex align-items-center">
        <div class="w-100 py-5 px-md-5 px-xl-6 position-relative">
          <div class="mb-4"><img class="img-fluid mb-4" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/logo-square.svg" alt="..." style="max-width: 4rem;">
            <h2>Sign up</h2>
            <p class="text-muted">His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table.</p>
          </div>
          <form class="form-validate" action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group">
              <label class="form-label" for="name">Name</label>
              <input class="form-control" name="name" id="name" type="text" placeholder="john doe" autocomplete="off" required data-msg="Please enter your name" value="{{ old('name') }}">
              @error('name')
                  <span class="text-danger mt-1">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="loginUsername"> Email Address</label>
              <input class="form-control" name="email" id="loginUsername" type="email" placeholder="name@address.com" autocomplete="off" required data-msg="Please enter your email" value="{{ old('email') }}">
              @error('email')
                  <span class="text-danger mt-1">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="loginPassword"> Password</label>
              <input class="form-control" name="password" id="loginPassword" placeholder="Password" type="password" required data-msg="Please enter your password">
              @error('password')
                  <span class="text-danger mt-1">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group mb-4">
              <label class="form-label" for="loginPassword2"> Confirm your password</label>
              <input class="form-control" name="password_confirmation" id="loginPassword2" placeholder="Password" type="password" required data-msg="Please enter your password">
              @error('password_confirmation')
                  <span class="text-danger mt-1">{{ $message }}</span>
              @enderror
            </div>
            <button class="btn btn-lg btn-block btn-warning" type="submit">Sign up</button>
<hr>

          </form>
        </div>
      </div>
      <div class="col-md-4 col-lg-6 col-xl-7 d-none d-md-block">
        <!-- Image-->
        <div class="bg-cover h-100 mr-n3" style="background-image: url({{ asset('front-end') }}/img/photo/photo-1497436072909-60f360e1d4b1.jpg);"></div>
      </div>
    </div>
  </div>

@endsection
