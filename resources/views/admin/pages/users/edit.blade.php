@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        
        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9">
                <h1 class="mb-3">Edit Pengguna</h1>
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('dashboard.index') }}" class="btn btn-outline-info"><i data-feather="chevron-left"></i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label for="name" class="card-title">Nama</label>
                                <input type="text" class="form-control" id="name" placeholder="Masukkan nama.." name="name" value="{{ $user->name }}" autofocus>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="email" class="card-title">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Masukkan email.." name="email" value="{{ $user->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="card-title">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Masukkan password.." name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="foto_profil" class="card-title">Foto Profil</label>
                                <input type="file" class="form-control" id="foto_profil" name="foto_profil">
                                @error('foto_profil')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="role" class="card-title">Role</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="admin_vendor" {{ $user->role === 'admin_vendor' ? 'selected' : '' }}>Admin Vendor</option>
                                    <option value="super_admin" {{ $user->role === 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="submit"><i data-feather="edit"></i>Perbarui Pengguna</button>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection