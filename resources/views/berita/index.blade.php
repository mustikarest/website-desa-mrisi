@extends('layouts.main')
@section('title', 'Berita - Desa Mrisi')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">Berita Desa Mrisi</h2>

    <!-- Filter Kategori -->
    <form method="GET" class="mb-4">
        <div class="row g-2">
            <div class="col-auto">
                <select name="kategori" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoriList as $kat)
                        @if($kat)
                            <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>
                                {{ $kat }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <div class="row g-4">
        @forelse($beritas as $berita)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $berita->judul }}">
                    @else
                        <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-image text-secondary fs-1"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        @if($berita->kategori)
                            <span class="badge bg-success mb-2">{{ $berita->kategori }}</span>
                        @endif
                        <h5 class="card-title">{{ $berita->judul }}</h5>
                        <p class="card-text text-muted small">{{ $berita->tanggal_publish->format('d M Y') }}</p>
                        <p class="card-text">{{ Str::limit(strip_tags($berita->isi), 100) }}</p>
                        <a href="{{ route('berita.show', $berita->slug) }}" class="btn btn-outline-success btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada berita yang dipublikasikan.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $beritas->links() }}
    </div>
</div>
@endsection