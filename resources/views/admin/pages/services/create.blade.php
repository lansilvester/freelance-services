@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9">
                <h1 class="mb-3">Tambah Service</h1>
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('service.index') }}" class="btn btn-outline-info"><i data-feather="chevron-left"></i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="category_id" class="card-title">Kategori</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    <option value="">--Pilih Kategori--</option>
                                    @forelse ($data_kategori as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                    @empty
                                        <option value="">Kategori Kosong</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="vendor_id" class="card-title">Vendor</label>
                                <select class="form-control" id="vendor_id" name="vendor_id">
                                    <option value="">--My Vendor--</option>
                                    @forelse ($data_vendor as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->nama }}</option>
                                    @empty
                                        <option value="">vendor Kosong</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="nama" class="card-title">Nama Service</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama service.." name="nama" autofocus>
                            </div>
                            <div class="form-group mb-4">
                                <label for="foto" class="card-title">Foto Service</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi" class="card-title">Deskripsi Service</label>
                                <textarea class="form-control" id="deskripsi" placeholder="Deskripsi service.." name="deskripsi"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100" name="submit"><i data-feather="plus"></i>Tambah Service</button>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
