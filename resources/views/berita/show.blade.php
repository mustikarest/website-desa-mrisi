@extends('layouts.main')
@section('title', $berita->judul . ' - Desa Mrisi')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($berita->kategori)
                <span class="badge bg-success mb-2">{{ $berita->kategori }}</span>
            @endif
            <h2 class="fw-bold">{{ $berita->judul }}</h2>
            <p class="text-muted">{{ $berita->tanggal_publish->format('d F Y') }}</p>

            @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid rounded mb-4" alt="{{ $berita->judul }}">
            @endif

            <div class="fs-5" style="white-space: pre-line;">
                {{ $berita->isi }}
            </div>

            <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary mt-4">
                <i class="bi bi-arrow-left"></i> Kembali ke Berita
            </a>
        </div>
    </div>
</div>
@endsection