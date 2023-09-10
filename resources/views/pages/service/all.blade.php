@extends('layouts.home-page')
@section('content')
<style>
  .text-gray{
    color:#666
  }
  .btn-primary:hover{
    transition:.3s;
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
    <span style="color:#007aaa"><i class="bi bi-bell"></i></span> Semua service
  </h2>
  <p>Temukan pelayanan yang anda cari di kota Manado</p>
  
</div>
<div class="container-fluid" style="background:#eaeaea">

  <div class="container py-5">
    <div class="row">
        <div class="col-12 mb-5">
            <div class="search" style="background:white;padding:1em;border-radius:1em; box-shadow:0px 3px 7px rgba(0,0,0,.15);">
                <h5 class="text-center mb-3"><i class="bi bi-search text-primary"></i> Cari Keperluan anda disini</h5>
                <form action="{{ route('search') }}" method="GET" class="d-flex">
                    <input type="text" class="form-control mx-2 px-3 py-2" name="query" placeholder="Cari Keperluan Anda disini">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                </form>
                
            </div>
        </div>
    </div>
    <div class="row mb-3" >
    @forelse ($data_service as $service)
      <div class="col-md-6 col-sm-6 col-xl-3">
        <div class="icon-box p-3  mb-3 shadow-sm rounded bg-white" style="border-radius: 1em">
          <a href="{{ route('service_home.show', $service->id) }}" style="text-decoration: none;color:#333">
            <img src="{{ asset('storage/'.$service->foto) }}" alt="" class="img-fluid mb-3">
            <h3>
              {{ $service->nama }}
            </h3>
          </a>
          <p class="mb-4 text-truncate">
            {{ $service->deskripsi }} <br>

          </p>
          <div class="profile-vendor">

            <a href="{{ route('vendor_home.show', $service->vendor->id) }}" class="shadow text-decoration-none text-dark">
              <div class="d-flex align-items-center mb-3">
                <img src="{{ asset('storage/'.$service->vendor->foto) }}" alt="" class="img-fluid me-3" style="width:40px; border-radius:.5em;">
                <div class="me-5">
                  <b>{{ $service->vendor->nama }}</b><br>
                  <span><i>{{ $service->vendor->user->name }}</i></span>
                </div>
                <span class="btn btn-primary">
                  <i class="bi bi-arrow-right"></i>
                </span>
              </div>
            </a>
          </div>
          
          <small class="text-gray"><i class='bx bx-map'></i> {{ $service->vendor->alamat }}</small><br>
          <small class="text-gray"><i class='bx bx-phone'></i> {{ $service->vendor->kontak }}</small><hr>
          <p class="text-gray text-center"><small><i class="bi bi-calendar"></i> {{ $service->created_at->format('d-M-Y') }} <strong>{{ $service->created_at->diffForHumans() }}</strong></small></p>

        </div>
        
      </div>
    @empty
      <div class="alert alert-info">Belum ada Service</div>
    @endforelse
  </div>
  
</div>
</div>

@endsection