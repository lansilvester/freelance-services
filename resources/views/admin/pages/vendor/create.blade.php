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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('vendor.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="nama" class="card-title">Nama Vendor</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama vendor.." name="nama" autofocus value="{{ old('nama') }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi" class="card-title">Deskripsi Vendor</label>
                                <textarea class="form-control" id="deskripsi" placeholder="Deskripsi vendor.." name="deskripsi" style="height:350px">{{ old('deskripsi') }}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="foto" class="card-title">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                                <img id="previewImage" src="#" alt="Preview" style="display: none; max-width: 100%; max-height: 200px;">
                            </div>
                            <div class="form-group mb-4">
                                <label for="kontak" class="card-title">Kontak</label>
                                <input type="text" class="form-control" id="kontak" placeholder="08xxxxx" name="kontak" value="{{ old('kontak') }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="alamat" class="card-title">Alamat</label>
                                <textarea class="form-control" id="alamat" placeholder="Alamat vendor.." name="alamat">{{ old('alamat') }}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="instagram" class="card-title">Instagram</label>
                                <input type="text" class="form-control" id="instagram" placeholder="https://instagram.com/" name="instagram" value="{{ old('instagram') }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="facebook" class="card-title">Facebook</label>
                                <input type="text" class="form-control" id="facebook" placeholder="https://facebook.com/" name="facebook" value="{{ old('facebook') }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="linkedin" class="card-title">LinkedIn</label>
                                <input type="text" class="form-control" id="linkedin" placeholder="https://linkedin.com/" name="linkedin" value="{{ old('linkedin') }}">
                            </div>
                            <button type="submit" class="btn btn-success w-100" name="submit"><i data-feather="plus"></i>Tambah Vendor</button>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    // Menangani peristiwa perubahan pada input file
    document.getElementById('foto').addEventListener('change', function(e) {
        const previewImage = document.getElementById('previewImage');
        const fileInput = e.target;

        if (fileInput.files.length > 0) {
            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else {
            previewImage.src = '#';
            previewImage.style.display = 'none';
        }
    });
</script>

@endsection