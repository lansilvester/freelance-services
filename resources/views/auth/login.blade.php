@extends('layouts.app')
@section('content')
<form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
    <h2 class=" mb-4 me-3">Login</h2>
  </div>
  @if(Session::has('register_success'))
    <div class="alert alert-success">{!! session('register_success') !!}</div>
  @endif
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form3Example3">Email address</label>
    <input id="email" type="email" placeholder="Masukan alamat email.." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <!-- Password input -->
  <div class="form-outline mb-3">
    <label class="form-label" for="form3Example4">Password</label>
    <input id="password" type="password" placeholder="Masukan password.." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <div class="text-center text-lg-start mt-4 pt-2">
    <button type="submit" class="btn btn-primary btn-lg"
      style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
    <p>Don't have an account? <a href="{{  route('register') }}">Register</a></p>
  </div>

</form>
@endsection