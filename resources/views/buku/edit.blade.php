@extends('layouts.app')

@section('title', 'Edit Buku - Aplikasi Nisya')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Edit Data Buku</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.buku', $bukus->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Buku</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                       id="judul" name="judul" value="{{ old('judul', $bukus->judul) }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" class="form-control @error('penulis') is-invalid @enderror"
                                       id="penulis" name="penulis" value="{{ old('penulis', $bukus->penulis) }}" required>
                                @error('penulis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select class="form-select @error('kategori') is-invalid @enderror"
                                        id="kategori" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Fiksi" {{ old('kategori', $bukus->kategori) == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                                    <option value="Non-Fiksi" {{ old('kategori', $bukus->kategori) == 'Non-Fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
                                    <option value="Pelajaran" {{ old('kategori', $bukus->kategori) == 'Pelajaran' ? 'selected' : '' }}>Pelajaran</option>
                                    <option value="Referensi" {{ old('kategori', $bukus->kategori) == 'Referensi' ? 'selected' : '' }}>Referensi</option>
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jml" class="form-label">Jumlah</label>
                                <input type="number" class="form-control @error('jml') is-invalid @enderror"
                                       id="jml" name="jml" value="{{ old('jml', $bukus->jml) }}" min="1" required>
                                @error('jml')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="img" class="form-label">Gambar Cover</label>
                                <input type="file" class="form-control @error('img') is-invalid @enderror"
                                       id="img" name="img" accept="image/*">
                                @error('img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if($bukus->img)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/'.$bukus->img) }}" alt="Current Cover" class="img-thumbnail" width="100">
                                        <p class="text-muted small mt-1">Gambar saat ini</p>
                                    </div>
                                @endif
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('index.buku') }}" class="btn btn-secondary me-md-2">Batal</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
