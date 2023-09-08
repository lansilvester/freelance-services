@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Service</strong></h1>
        
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    @if (session('success'))
                        <div class="alert alert-primary">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Semua Service</h5>
                        <a href="{{ route('service.create') }}" class="btn btn-success fw-bolder"><i data-feather="plus"></i> Tambah Service</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Vendor</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data_service as $i => $service)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $service->vendor->nama }}</td>
                                    <td>{{ $service->nama }}</td>
                                    <td>{{ $service->deskripsi }}</td>
                                    <td><b style="font-size:1.4em">{!! $service->category->icon !!}</b> {{ $service->category->nama }}</td>
                                    
                                    <td>
                                        <a href="{{ route('service.show', $service->id) }}" class="btn btn-info"><i data-feather="eye"></i></a>
                                        <a href="{{ route('service.edit', $service->id) }}" class="btn btn-warning"><i data-feather="edit"></i></a>
                                        <form action="{{ route('service.destroy', $service->id) }}" method="POST" class="d-inline">
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
