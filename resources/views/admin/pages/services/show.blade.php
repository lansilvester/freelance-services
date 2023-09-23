@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12\">
                <h1 class="mb-3">Detail Service</h1>
                <div class="card flex-fill">
                    <div class="card-header">
                        <a href="{{ route('service.index') }}" class="btn btn-outline-info mb-3"><i data-feather="chevron-left"></i> Back</a>
                        <h5 class="card-title mb-0">Service Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $service->foto) }}" alt="Foto Service" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title">Category</h5>
                                <p class="card-text">{{ $service->category->nama }}</p>
                                <h5 class="card-title">Service Name</h5>
                                <p class="card-text">{{ $service->nama }}</p>
                                <h5 class="card-title">Description</h5>
                                <p class="card-text">{{ $service->deskripsi }}</p>
                                <h5 class="card-title">List Layanan</h5>
                                <p class="card-text">{{ $service->layanan }}</p>
                                <a href="{{ route('service.edit', $service->id) }}" class="btn btn-info">Edit</a>
                            </div>
                            <div class="col-md-3">
                                <h5 class="card-title">Vendor</h5>
                                <a href="" target="__blank" style="text-decoration: none ">

                                    <div class="d-flex align-items-center px-1" style="border-radius:.5em; box-shadow:3px 2px 7px rgba(0, 0, 0, 0.101);">
                                        <img src="{{ asset('storage/' .  $service->vendor->foto) }}" alt="Foto Service" class="img-fluid my-3" style=" width:50px; margin-right:1em; border-radius:.8em;">
                                    <span>
                                        <h4>
                                            {{ $service->vendor->nama }}
                                        </h4>
                                        <small class="text-gray">{{ $service->vendor->user->name }}</small><br>
                                        <strong class="text-gray">{{ $service->vendor->kontak }}</strong>
                                    </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
