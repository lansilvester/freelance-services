@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Selamat Datang</strong>, {{ Auth::user()->email }}</h1>

        <div class="row">
            <div class="col-12 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Users</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $data_users->count() }}</h1>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Kategori</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="list"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $data_kategori->count() }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Vendor</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="award"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $data_vendor->count() }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Service</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="bell"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $data_service->count() }}</h1>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    @if (session('success'))
                    <div class="alert alert-primary">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Daftar Users</h5>
                        <a href="{{ route('users.create') }}" class="btn btn-success"><i data-feather="plus"></i> Tambah User</a>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Name</th>
                                <th class="d-none d-xl-table-cell">Email</th>
                                <th>Status</th>
                                <th class="d-none d-md-table-cell">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_users as $i => $user)
                            <tr>
                                <td>{{ $i+1; }}</td>
                                <td><img src="{{ asset('storage/'.$user->foto_profil) }}" alt="profile" width="120" class="rounded"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><span class="badge badge-success bg-success">aktif</span></td>
                                <td class="text-center">
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"><i data-feather="eye"></i></a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i data-feather="edit"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection