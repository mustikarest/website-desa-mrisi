@extends('layouts.main')
@section('title', 'Edit Berita')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="fw-bold mb-4">Edit Berita</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $berita->judul) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $berita->kategori) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Berita</label>
                    <textarea name="isi" rows="8" class="form-control" required>{{ old('isi', $berita->isi) }}</textarea>
                </div>

                @if($berita->gambar)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" width="150" class="rounded mb-2">
                        <p class="text-muted small">Gambar saat ini. Upload baru untuk mengganti.</p>
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label">Ganti Gambar</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="is_published" class="form-check-input" id="is_published" {{ $berita->is_published ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Publikasikan</label>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection