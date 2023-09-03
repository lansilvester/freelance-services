@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        
        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9">
                <h1 class="mb-3">Edit Kategori</h1>
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('kategori.index') }}" class="btn btn-outline-info"><i data-feather="chevron-left"></i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label for="category" class="card-title">Nama Kategori</label>
                                <input type="text" class="form-control" id="category" placeholder="Ketikan kategori.." name="nama" value="{{ $kategori->nama }}" autofocus>
                            </div>
                            <div class="form-group mb-4">
                                <label for="description" class="card-title">Deskripsi Kategori</label>
                                <textarea class="form-control" id="description" placeholder="Deskripsi kategori.." name="deskripsi">{{ $kategori->deskripsi ?? '' }}</textarea>
                            </div>                            
                            <div class="form-group mb-4">
                                <label for="category" class="card-title">Icon Kategori</label><br>
                                <input type="text" class="form-control" id="category" placeholder="Contoh: <i class='bx bx-category' ></i>" name="icon" value="{{ $kategori->icon }}">
                                <a href="https://boxicons.com/" target="__blank">Lihat seluruh icon</a>
                                <small> copy icon pada tab font</small>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="submit"><i data-feather="edit"></i>Update Kategori</button>
                        </form>     
                    </div>
                </div>
            </div>
        </div>


    </div>
</main>
@endsection
