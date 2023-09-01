@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Kategori</strong></h1>
        
        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    @if (session('success'))
                        <div class="alert alert-primary">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Semua Kategori</h5>
                        <a href="{{ route('kategori.create') }}" class="btn btn-success fw-bolder"><i data-feather="plus"></i> Tambah Data Kategori</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th class="d-none d-xl-table-cell">Icon Kategori</th>
                                    <th class="d-none d-xl-table-cell">Jumlah Item</th>
                                    <th class="d-none d-md-table-cell">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data_kategori as $i => $data)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->deskripsi }}</td>
                                    <td style="font-size: 3em">{!! $data->icon !!}</td>
                                    <td>{{ $data->count() }}</td>
                                    <td class="text-center">
                                        {{-- <a href="{{ route('kategori.show', $data->id) }}" class="btn btn-info"><i data-feather="eye"></i></a> --}}
                                        <a href="{{ route('kategori.edit', $data->id) }}" class="btn btn-warning"><i data-feather="edit"></i></a>
                                        <form action="{{ route('kategori.destroy', $data->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i data-feather="trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Belum ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <h1><i class='bx bx-layout text-primary my-5'></i> Tampilan</h1>
            
            @foreach ($data_kategori as $data)
                
            <div class="col-xl-3 col-md-3 mb-3 p-3 text-center" data-aos="zoom-in" data-aos-delay="100" style="background:white; margin:0px 10px; border-radius:1em; box-shadow:3px 3px 5px rgba(0,0,0,.1)">
              <div class="icon-box w-100" style="border-radius: 1em">
                <div class="icon" style="font-size:3em;color:#47b2e4">{!! $data->icon !!}</div>
                <h3 class="" style="color: #37517e; font-weight:bold">{{ $data->nama }}</h3>
                <p>{{ $data->deskripsi }}</p>
              </div>
            </div>
            @endforeach
            
          </div>

    </div>
</main>
@endsection