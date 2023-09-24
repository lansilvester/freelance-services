@extends('admin.base')
@section('content')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
	tinymce.init({
		selector: '#deskripsi',
	});
	tinymce.init({
		selector: '#layanan',
	});
</script>
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
                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                    <option value="">--Pilih Kategori--</option>
                                    @forelse ($data_kategori as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                    @empty
                                        <option value="">Kategori Kosong</option>
                                    @endforelse
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="vendor_id" class="card-title">Vendor</label>
                                <select class="form-control @error('vendor_id') is-invalid @enderror" id="vendor_id" name="vendor_id">
                                    <option value="">--My Vendor--</option>
                                    @forelse ($data_vendor as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->nama }}</option>
                                    @empty
                                        <option value="">vendor Kosong</option>
                                    @endforelse
                                </select>
                                @error('vendor_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="nama" class="card-title">Nama Service</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama service.." name="nama" autofocus>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="foto" class="card-title">Foto Service</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                                @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi" class="card-title">Deskripsi Service</label>
                                <textarea  class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi service.." name="deskripsi"></textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="layanan" class="card-title">List Layanan</label>
                                <textarea class="form-control @error('layanan') is-invalid @enderror" id="layanan" placeholder="Layanan" name="layanan" rows="10"></textarea>
                                @error('layanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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