@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9">
                <h1 class="mb-3">Tambah Vendor</h1>
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('vendor.index') }}" class="btn btn-outline-info"><i data-feather="chevron-left"></i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vendor.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="nama" class="card-title">Nama Vendor</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama vendor.." name="nama" autofocus>
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi" class="card-title">Deskripsi Vendor</label>
                                <textarea class="form-control" id="deskripsi" placeholder="Deskripsi vendor.." name="deskripsi"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="foto" class="card-title">Foto Vendor</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                            <div class="form-group mb-4">
                                <label for="kontak" class="card-title">Kontak</label>
                                <input type="text" class="form-control" id="kontak" placeholder="Masukkan kontak vendor.." name="kontak">
                            </div>
                            <div class="form-group mb-4">
                                <label for="alamat" class="card-title">Alamat</label>
                                <textarea class="form-control" id="alamat" placeholder="Alamat vendor.." name="alamat"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="instagram" class="card-title">Instagram</label>
                                <input type="text" class="form-control" id="instagram" placeholder="Masukkan akun Instagram vendor.." name="instagram">
                            </div>
                            <div class="form-group mb-4">
                                <label for="facebook" class="card-title">Facebook</label>
                                <input type="text" class="form-control" id="facebook" placeholder="Masukkan akun Facebook vendor.." name="facebook">
                            </div>
                            <div class="form-group mb-4">
                                <label for="linkedin" class="card-title">LinkedIn</label>
                                <input type="text" class="form-control" id="linkedin" placeholder="Masukkan akun LinkedIn vendor.." name="linkedin">
                            </div>
                            <button type="submit" class="btn btn-success w-100" name="submit"><i data-feather="plus"></i>Tambah Vendor</button>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
