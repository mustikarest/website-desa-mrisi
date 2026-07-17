<x-app-layout>
    <div class="p-6">
        <h1>Daftar Pengumuman</h1>

        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        @forelse ($pengumumen as $item)
            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                <strong>{{ $item->judul }}</strong> ({{ $item->prioritas }})<br>
                {{ $item->isi }}<br>
                <small>Oleh: {{ $item->user->name }}</small>
            </div>
        @empty
            <p>Belum ada pengumuman.</p>
        @endforelse
    </div>
</x-app-layout>