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
            <div class="col-4 shadow p-3 rounded">
                <img src="{{ asset('storage/'.$vendor->foto) }}" alt="" class="img-fluid mb-3" style="width:100%; border-radius:.5em;">
                <div class="mb-5">
                    <div class="text-center mb-3">
                        <h3>{{ $vendor->nama }}</h3>
                        <span class="badge badge-success bg-info mb-4"> 
                            <small>{{ $vendor->user->name }}</small>
                        </span>
                    </div>
                    <b>Deskripsi</b>
                    <p style="color:#666">{{ $vendor->deskripsi }}</p>
                    <div class="d-flex justify-content-between mb-3">
                        <b><i class="bi bi-calendar"></i> Bergabung Sejak</b>
                        <span>{{ $vendor->created_at->format('d-M-Y') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <b><i class="bi bi-telephone"></i> Kontak</b>
                        <span>{{ $vendor->kontak }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <b><i class="bi bi-envelope"></i> Email</b>
                        <span>{{ $vendor->user->email }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <b><i class="bi bi-map"></i> Alamat</b>
                        <span>{{ $vendor->alamat }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <b><i class="bi bi-at"></i> Social Media</b>
                        <span>
                            <a href="{{ $vendor->facebook }}" class="btn btn-primary">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="{{ $vendor->instagram }}" class="btn btn-primary">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="{{ $vendor->linkedin }}" class="btn btn-primary">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <b><i class="bi bi-map"></i> Maps</b><br>
                        {!! $vendor->map !!}
                    </div>
                    
                </div>
            </div>
            <div class="col-8 px-5">
                <h1 class="mb-4"><i class="bi bi-bell text-primary"></i> Service</h1>
                <div class="row">
                    <style>
                        .service:hover{
                            transition:.3s;
                            transform:scale(1.01);
                        }
                    </style>
                        @forelse ($data_service as $service)
                        <div class="col-6 service">
                            <a href="{{ route('service_home.show', $service->id) }}" style="text-decoration: none;color:#333">
                                <div class="p-3 shadow bg-white" style="border-radius: 1em">
                                    <img src="{{ asset('storage/'.$service->foto) }}" alt="" class="img-fluid mb-3 rounded">
                                    <h3>
                                    {{ $service->nama }}
                                    </h3>
                                    <small class="text-dark text-opacity-50">{{ $service->created_at->diffForHumans() }}</small>
                                    <p class="mb-3 text-truncate">{{ $service->deskripsi }}</p>
                                    <a href="{{ route('service_home.show', $service->id) }}" class="btn btn-primary"><i class="bi bi-eye"></i> Lihat Selengkapnya</a>
                                </div>
                            </a>
                        </div>
                        @empty
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-info">Belum ada service</div>
                                </div>
                            </div>
                        @endforelse

            </div>
        </div>
    </div>
    </div>
</div>

@endsection