@extends('layouts.home-page')
@section('content')
<div class="container-fluid py-3">
    <ul class="list-inline text-center">
        @foreach($data_kategori as $data)
            <li class="list-inline-item  m-3">
                <a href="{{ route('category_home.show', $data->id) }}" class="text-decoration-none text-dark">{!! $data->icon !!} {{ $data->nama }}</a>
            </li>
        @endforeach
    </ul>
</div>

<div class="container-fluid" style="background:#eaeaea">
    <div class="container py-5">
        <div class="row mb-3 shadow py-5 px-4 bg-white rounded">
            <div class="col-md-4 col-sm-12 col-xs-12 shadow p-4 rounded">
                <img src="{{ asset('storage/'.$service->foto) }}" alt="" class="img-fluid mb-5" style="width:100%; border-radius:.5em;">
                
                <small>Vendor </small><br>
                <span class="badge badge-info bg-info mb-4"> 
                    <a href="{{ route('vendor_home.show', $service->vendor->id) }}" class="text-decoration-none text-white p-2"><i class="bi bi-award-fill text-warning"></i> 
                        {{ $service->vendor->nama }}
                    </a>
                </span>
                <div class="d-flex justify-content-between mb-3">
                    <b><i class="bi bi-telephone"></i> Kontak</b>
                    <span>{{ $service->vendor->kontak }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <b><i class="bi bi-envelope"></i> Email</b>
                    <span><a href="mailto:{{ $service->vendor->user->email }}" target="_blank" class="text-decoration-none">{{ $service->vendor->user->email }}</a></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <b><i class="bi bi-map"></i> Alamat</b>
                    <span>{{ $service->vendor->alamat }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <b><i class="bi bi-at"></i> Social Media</b>
                    <span>
                        <a href="{{ $service->vendor->facebook }}" class="btn btn-primary">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="{{ $service->vendor->instagram }}" class="btn btn-primary">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="{{ $service->vendor->linkedin }}" class="btn btn-primary">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="https://wa.me/{{ $service->vendor->kontak }}?text=Halo%20admin,%20Saya%20ingin%20melakukan%20pemesanan%20service:%20{{ $service->nama }}"
                        class="btn btn-success w-100" target="_blank">
                        <i class="bi bi-whatsapp"></i> Hubungi via <strong>WhatsApp</strong>
                    </a>
                </div>
                
                
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12 py-3 px-5 rounded">
                <div class="mb-4">
                    <a href="/" class=" text-decoration-none">Beranda</a> &nbsp;>&nbsp; <a href="{{ route('category_home.show',$service->category->id) }}" class=" text-decoration-none">{{ $service->category->nama }}</a> &nbsp;>&nbsp; {{ $service->nama }}
                </div>
                <span class="badge badge-success bg-success mb-2">{{ $service->category->nama }}</span>
                <h3>{{ $service->nama }}</h3>
                <small class="text-dark text-opacity-50">{{ $service->created_at->diffForHumans() }}</small>
                <p class="py-3">{{ $service->deskripsi }}</p>
            </div>
        </div>
    </div>
</div>

@endsection