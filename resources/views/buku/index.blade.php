@extends('layouts.app')

@section('title', 'Home - Aplikasi Nisya')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Daftar Buku</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Buku</th>
                                        <th>Penulis</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bukus as $index => $buku)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $buku->judul }}</td>
                                            <td>{{ $buku->penulis }}</td>
                                            <td>{{ $buku->kategori }}</td>
                                            <td>{{ $buku->jml }}</td>
                                            <td>
                                                @if($buku->img)
                                                    <img src="{{ asset('storage/'.$buku->img) }}" alt="Cover Buku" class="img-thumbnail" width="80">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('edit.buku',$buku->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{route('destroy.buku',$buku->id)}}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                                @csrf
                                                @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('create.buku') }}" class="btn btn-success">Tambah Buku</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
