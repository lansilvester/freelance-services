@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Vendor</strong></h1>
        
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    @if (session('success'))
                        <div class="alert alert-primary">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Semua Vendor</h5>
                        <a href="{{ route('vendor.create') }}" class="btn btn-success fw-bolder"><i data-feather="plus"></i> Tambah Vendor</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Kontak</th>
                                    <th>Alamat</th>
                                    <th>Jumlah Service</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data_vendor as $i => $vendor)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $vendor->nama }}</td>
                                    <td>{{ $vendor->deskripsi }}</td>
                                    <td>{{ $vendor->kontak }}</td>
                                    <td>{{ $vendor->alamat }}</td>
                                    <td>{{ $vendor->services->count() }}</td>
                                    <td>
                                        <a href="{{ route('vendor.show', $vendor->id) }}" class="btn btn-info"><i data-feather="eye"></i></a>
                                        <a href="{{ route('vendor.edit', $vendor->id) }}" class="btn btn-warning"><i data-feather="edit"></i></a>
                                        <form action="{{ route('vendor.destroy', $vendor->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i data-feather="trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">Belum ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
