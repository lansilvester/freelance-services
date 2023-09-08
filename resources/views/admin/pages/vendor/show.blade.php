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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12 col-xl-3 mb-4">
                                <h5 class="card-title">Vendor</h5>
                                <img src="{{ asset('storage/' .  $vendor->foto) }}" alt="Foto Service" class="img-fluid mb-3" style=" width:px; margin-right:1em; border-radius:.8em;">
                                <a href="{{ route('vendor.edit',$vendor->id) }}" class="btn btn-success w-100"><i data-feather="edit-2"></i> Edit</a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 col-xl-3 mb-4 rounded">
                                <div class="d-flex p-2" style="border-radius:.5em; box-shadow:3px 2px 7px rgba(0, 0, 0, 0.101);">
                                    <div class="mb-3">
                                        <h4>
                                            {{ $vendor->nama }}
                                        </h4>
                                        <div style="color:#888; margin-bottom:15px;">
                                            <small class="text-gray">{{ $vendor->user->name }}</small><br>
                                            <strong class="text-gray">{{ $vendor->kontak }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-2 shadow p-2">
                                    <h5 class="card-title">Deskripsi</h5>
                                    <p>{{ $vendor->deskripsi }}</p>
                                </div>
                                <div class="my-2 shadow p-2">
                                    <h5 class="card-title">Alamat</h5>
                                    <p>{{ $vendor->alamat }}</p>
                                </div>
                            </div>
                            <style>
                                a, a:hover{
                                    text-decoration: none;
                                }
                            </style>
                            <div class="col-md-4 col-sm-6 col-xs-12 col-xl-3 mb-4 shadow-lg rounded">
                                <h5 class="card-title">Social Media</h5>
                                <div class="mb-3">
                                    <a href="{{ $vendor->facebook }}" style="background-color:#0061ab; color:white; padding:5px 10px;border-radius:.5em;">
                                        <i data-feather="facebook"></i>
                                        {{ $vendor->facebook }}
                                    </a>
                                </div>
                                <div class="mb-3">
                                    <a href="{{ $vendor->instagram }}" style="background-color:#e15096; color:white; padding:5px 10px;border-radius:.5em;">
                                        <i data-feather="instagram"></i>
                                        {{ $vendor->instagram }}
                                    </a>
                                </div>
                                <div class="mb-3">
                                    <a href="{{ $vendor->linkedin }}" style="background-color:#008fb7; color:white; padding:5px 10px;border-radius:.5em;">
                                        <i data-feather="linkedin"></i>
                                        {{ $vendor->linkedin }}
                                    </a>
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 col-xl-3 mb-4 shadow-lg">
                                <h5 class="card-title">Bergabung Sejak</h5>
                                <div class="my-2 py-2">
                                    <strong>
                                    {{ $vendor->created_at->format('d-M-Y') }}
                                    </strong><br>
                                    <i>
                                    {{ $vendor->created_at->diffForHumans() }}
                                    </i>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="shadow-lg px-3">
                            <h3>Services</h3>
                            <small><i>Jumlah Service : {{ $data_service->count() }}</i></small>
                            @forelse ($data_service as $data)
                            <div class="d-flex align-items-center">
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-2">
                                        <img src="{{ asset('storage/' .  $data->foto) }}" alt="Foto Service" class="img-fluid my-3 shadow-lg" style=" width:300px; margin-right:1em; border-radius:.8em;"><br>
                                        <a href="{{ route('service.edit', $data->id) }}" class="btn btn-outline-success"><i data-feather="edit-2"></i> Edit</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('service.show', $data->id) }}">
                                            <h3 class="fw-bold">{{ $data->nama }}</h3>
                                        </a>
                                        <span>{{ $data->deskripsi }}</span>
                                        <small><i>{{ $data->created_at->format('d-M-Y') }}</i></small><br>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="alert alert-info">Data belum ada</div>
                            @endforelse
                           

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
