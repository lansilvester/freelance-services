@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="mb-3">Profile</h1>
        
        <div class="bg-white p-4 shadow-lg">

            <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="card-header mb-3"><h4><i class="bi bi-person"></i> {{ __('User Profile') }}</h4></div>
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="{{ $user->name }}" class="img-fluid rounded" width="400">
                        </div>
                        
                        <h2>{{ $user->name }}</h2>
                        <p>{{ $user->email }}</p>
                        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary"><i class="bi bi-pen"></i> Edit Profile</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-header mb-3"><h4><i class="bi bi-award"></i> {{ __('Vendor') }}</h4></div>
                    @forelse ($data_vendor as $data)
                        <div class="d-flex align-items-center shadow-lg p-4">
                            <img src="{{ asset('storage/' . $data->foto) }}" alt="{{ $user->name }}" class="img-fluid rounded me-3" width="50">
                            <div class="teks" style="">
                                <a href="{{ route('vendor.show', $data->id) }}" class="text-decoration-none">
                                    <h4 style="color:#008e93;font-weight:bolder">{{ $data->nama }}</h4>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-success">
                            <strong>Belum ada Vendor</strong>
                            <p class="my-4">
                                <a href="{{ route('vendor.create') }}" class="btn btn-success"><i class="bi bi-plus"></i> Vendor</a>
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</main>
@endsection