@extends('layouts.app')
@section('content')
<div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
  <h2 class=" mb-4 me-3">Mendaftar</h2>
</div>
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
  @csrf

  <div class="mb-3">
      <label for="name" class="form-label">{{ __('Name') }}</label>
      <input id="name" type="text" placeholder="Masukan nama lengkap.." class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

      @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>

  <div class="mb-3">
      <label for="email" class="form-label">{{ __('Email Address') }}</label>
      <input id="email" placeholder="Masukan alamat email.." type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

      @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>

  <div class="mb-3">
      <label for="password" class="form-label">{{ __('Password') }}</label>
      <input id="password" placeholder="Masukan Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

      @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>

  <div class="mb-3">
      <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
      <input id="password-confirm" placeholder="Masukan Kembali Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
  </div>

  <div class="mb-3">
      <label for="foto_profil" class="form-label">{{ __('Profile Photo') }}</label>
      <input id="foto_profil" type="file" class="form-control @error('foto_profil') is-invalid @enderror" name="foto_profil">

      @error('foto_profil')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>

  <button type="submit" class="btn btn-primary">
      {{ __('Register') }}
  </button>
  <p>Sudah punya akun? Silahkan <a href="{{ route('login') }}">Login</a></p>
</form>
@endsection