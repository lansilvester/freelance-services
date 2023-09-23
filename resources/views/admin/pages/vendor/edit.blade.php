@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9">
                <h1 class="mb-3">Edit Vendor</h1>
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
                        
                        <form action="{{ route('vendor.update', $vendor->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label for="nama" class="card-title">Nama Vendor</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama vendor.." name="nama" value="{{ $vendor->nama }}" autofocus>
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi" class="card-title">Deskripsi Vendor</label>
                                <textarea class="form-control" id="deskripsi" placeholder="Deskripsi vendor.." name="deskripsi">{{ $vendor->deskripsi }}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="foto" class="card-title">Foto Vendor</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                                <img id="previewImage" src="#" alt="Preview" style="display: none; max-width: 100%; max-height: 200px;">
                            </div>
                            
                            <div class="form-group mb-4">
                                <label for="kontak" class="card-title">Kontak</label>
                                <input type="text" class="form-control" id="kontak" placeholder="Masukkan kontak vendor.." name="kontak" value="{{ $vendor->kontak }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="alamat" class="card-title">Alamat</label>
                                <textarea class="form-control" id="alamat" placeholder="Alamat vendor.." name="alamat">{{ $vendor->alamat }}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="instagram" class="card-title">Instagram</label>
                                <input type="text" class="form-control" id="instagram" placeholder="Masukkan akun Instagram vendor.." name="instagram" value="{{ $vendor->instagram }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="facebook" class="card-title">Facebook</label>
                                <input type="text" class="form-control" id="facebook" placeholder="Masukkan akun Facebook vendor.." name="facebook" value="{{ $vendor->facebook }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="linkedin" class="card-title">LinkedIn</label>
                                <input type="text" class="form-control" id="linkedin" placeholder="Masukkan akun LinkedIn vendor.." name="linkedin" value="{{ $vendor->linkedin }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="map" class="card-title">Maps</label>
                                <div>
                                    {!! $vendor->map !!}
                                </div>
                                <small><a target="_blank" href="https://www.google.com/maps/place/Kota+Manado,+Sulawesi+Utara/@1.4560422,124.8225907,12z/data=!4m6!3m5!1s0x32879ef9ffb30fd3:0x3030bfbcaf77280!8m2!3d1.4748305!4d124.8420794!16zL20vMDNnZnpi?entry=ttu"><b>Open map</b></a>>Bagikan>Sematkan Peta>Salin HTML> <i>Paste</i> dibawah</small>
                                <input type="text" class="form-control" id="map" placeholder="Masukkan akun map vendor.." name="map" value="{{ $vendor->map }}">
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="submit"><i data-feather="edit"></i>Update Vendor</button>
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
