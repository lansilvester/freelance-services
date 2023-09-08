@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9">
                <h1 class="mb-3">Edit Service</h1>
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('service.index') }}" class="btn btn-outline-info"><i data-feather="chevron-left"></i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label for="category_id" class="card-title">Kategori</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    <option value="">--Pilih Kategori--</option>
                                    @foreach ($data_kategori as $kategori)
                                        <option value="{{ $kategori->id }}" {{ $kategori->id == $service->category_id ? 'selected' : '' }}>
                                            {{ $kategori->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group mb-4">
                                <label for="nama" class="card-title">Nama Service</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama service.." name="nama" autofocus value="{{ $service->nama }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="foto" class="card-title">Foto Service</label><br>
                                <img src="{{ asset('storage/'.$service->foto) }}" alt="" width="150px">
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi" class="card-title">Deskripsi Service</label>
                                <textarea class="form-control" id="deskripsi" placeholder="Deskripsi service.." name="deskripsi">{{ $service->deskripsi }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="submit"><i data-feather="edit"></i>Update Service</button>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection