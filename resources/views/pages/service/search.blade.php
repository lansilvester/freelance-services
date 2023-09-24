@extends('layouts.home-page')
@section('content')
<style>
  .text-gray {
    color: #666
  }

  .btn-primary:hover {
    transition: .3s;
    transform: scale(1.2);
  }
</style>
<div class="container pb-5">
  <ul class="list-inline text-center">
    @foreach($data_kategori as $data)
    <li class="list-inline-item  m-3">
      <a href="{{ route('category_home.show', $data->id) }}" class="text-decoration-none text-dark">{!! $data->icon !!} {{ $data->nama }}</a>
    </li>
    @endforeach
  </ul>
  <h2>
    <span style="color:#007aaa"><i class="bi bi-bell"></i></span> Hasil Pencarian
  </h2>
  <p>Temukan pelayanan yang Anda cari di kota Manado</p>
</div>
<div class="container-fluid" style="background:#eaeaea">

  <div class="container py-5">
    <div class="row">
      <div class="col-12 mb-5">
        <div class="search" style="background:white;padding:1em;border-radius:1em; box-shadow:0px 3px 7px rgba(0,0,0,.15);">
          <h5 class="text-center mb-3"><i class="bi bi-search text-primary"></i> Cari Keperluan Anda disini</h5>
          <form action="{{ route('search') }}" method="GET" class="d-flex">
            <input type="text" class="form-control mx-2 px-3 py-2" name="query" placeholder="Cari Keperluan Anda disini" value="{{ $query }}">
            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
          </form>
          <p class="text-center my-2">Hasil Pencarian untuk <i>'{{ $query }}'</i> <a href="{{ route('service_home.index') }}" class="btn btn-danger">&times;</a></p>
        </div>
      </div>
    </div>
    <div class="row mb-3 d-flex justify-content-evenly">
      @forelse ($results as $result)
      <div class="col-md-3 mb-3 shadow-sm rounded bg-white">
        <div class="icon-box w-100 p-2" style="border-radius: 1em">
          <a href="{{ route('service_home.show', $result->id) }}" style="text-decoration: none;color:#333">
            <img src="{{ asset('storage/'.$result->foto) }}" alt="" class="img-fluid mb-3">
            <h3>
              {{ $result->nama }}
            </h3>
          </a>
          <div class="profile-vendor">
            
            <a href="{{ route('vendor_home.show', $result->id) }}" class="shadow text-decoration-none text-dark">
              <div class="d-flex align-items-center mb-3">
                <img src="{{ asset('storage/'.$result->foto) }}" alt="" class="img-fluid me-3"
                  style="width:40px; border-radius:.5em;">
                <div class="me-5">
                  <b>{{ $result->vendor->nama }}</b><br>
                  <span><i>{{ $result->vendor->user->name }}</i></span>
                </div>
                <span class="btn btn-primary">
                  <i class="bi bi-arrow-right"></i>
                </span>
              </div>
            </a>
        </div>
        <small class="text-gray"><i class='bx bx-map'></i> {{ $result->vendor->alamat }}</small><br>
        <small class="text-gray"><i class='bx bx-phone'></i> {{ $result->vendor->kontak }}</small><hr>
        <p class="text-gray text-center"><small><i class="bi bi-calendar"></i>
            {{ $result->created_at->format('d-M-Y') }} <strong>{{ $result->created_at->diffForHumans() }}</strong></small>
        </p>
        </div>
      </div>
      @empty
      <div class="alert alert-info">Tidak ada hasil yang ditemukan.</div>
      @endforelse
    </div>
  </div>
</div>
</div>
@endsection