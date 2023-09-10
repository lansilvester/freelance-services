@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3">Vendor</h1>
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <a href="{{ route('vendor.index') }}" class="btn btn-outline-info"><i data-feather="chevron-left"></i> Back</a>
                    </div>
                    <style>
                        a, a:hover{
                            text-decoration: none;
                        }
                    </style>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12 mb-4">
                                <h5 class="card-title">Vendor</h5>
                                <img src="{{ asset('storage/' .  $vendor->foto) }}" alt="Foto Service" class="img-fluid mb-3" style=" width:px; margin-right:1em; border-radius:.8em;">
                                <a href="{{ route('vendor.edit',$vendor->id) }}" class="btn btn-success w-100"><i data-feather="edit-2"></i> Edit</a>
                                <div style="color:#888; margin:2em 0px;">
                                    <h2>
                                        {{ $vendor->nama }}
                                    </h2>
                                    <strong class="text-gray">{{ $vendor->user->name }}</strong><br><br>
                                    <small class="text-gray"><i class="bi bi-envelope"></i> {{ $vendor->user->email }}</small><br>
                                    <strong class="text-gray"><i class="bi bi-telephone"></i> {{ $vendor->kontak }}</strong>
                                    
                                    <div class="my-2 shadow p-2">
                                        <h5 class="card-title">Alamat</h5>
                                        <p>{{ $vendor->alamat }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12 mb-4 shadow-lg rounded">
                                <h5 class="card-title">Social Media</h5>
                                <div class="mb-3">
                                    <a href="{{ $vendor->facebook }}" style="margin:5px;background-color:#0061ab; color:white; padding:5px 10px;border-radius:.5em;">
                                        <i data-feather="facebook"></i>
                                        {{ $vendor->facebook }}
                                    </a>
                                    <a href="{{ $vendor->instagram }}" style="margin:5px;background-color:#e15096; color:white; padding:5px 10px;border-radius:.5em;">
                                        <i data-feather="instagram"></i>
                                        {{ $vendor->instagram }}
                                    </a>
                                    <a href="{{ $vendor->linkedin }}" style="margin:5px;background-color:#008fb7; color:white; padding:5px 10px;border-radius:.5em;">
                                        <i data-feather="linkedin"></i>
                                        {{ $vendor->linkedin }}
                                    </a>
                                    
                                    <div class="my-2 shadow p-2">
                                        <h5 class="card-title">Deskripsi</h5>
                                        <p>{{ $vendor->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="shadow-lg px-3 py-2">
                            <h3>Services</h3>
                            <small><i>Jumlah Service : {{ $data_service->count() }}</i></small>
                            <div class="d-flex align-items-center">
                                <div class="row">
                                    @forelse ($data_service as $data)
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{ asset('storage/' .  $data->foto) }}" alt="Foto Service" class="img-fluid my-3 shadow-lg" style=" width:100%; border-radius:.8em;"><br>
                                                <a href="{{ route('service.show', $data->id) }}">
                                                    <h3 class="fw-bold">{{ $data->nama }}</h3>
                                                    <p class="text-dark"><small>{{ $data->created_at->format('d-M-Y') }}</small></p>
        
                                                </a>
                                                <a href="{{ route('service.edit', $data->id) }}" class="btn btn-outline-success"><i data-feather="edit-2"></i> Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    @empty

                                </div>
                            </div>
                                <div class="alert alert-info">
                                    <p>
                                        <strong>Data kosong</strong>, anda belum memiliki service
                                    </p>
                                    <a href="{{ route('service.create') }}" class="btn btn-success"><i class="bi bi-plus"></i> Buat Service Sekarang</a>
                                </div>
                            @endforelse
                           

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
