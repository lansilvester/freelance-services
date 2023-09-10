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
            <a href="{{ route('category_home.show', $data->id) }}" class="text-decoration-none {{ Request::is('category_home/'. $data->id) ? 'text-info' : 'text-dark' }}">{!! $data->icon !!} {{ $data->nama }}</a>
        </li>
    @endforeach
  </ul>
  <h2>
    <span style="color:#007aaa">{!! $kategori->icon !!}</span> {{ $kategori->nama }}
  </h2>
</div>
<div class="container-fluid" style="background:#eaeaea">

  <div class="container py-5">
    <div class="row mb-3 d-flex justify-content-evenly" >
    @forelse ($data_service as $service)
    <div class="col-md-3 mb-3 shadow-sm rounded bg-white">
      
      <div class="icon-box w-100 p-2" style="border-radius: 1em">
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