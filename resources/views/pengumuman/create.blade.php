<x-app-layout>
    <div class="p-6">
        <h1>Tambah Pengumuman (Test)</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pengumuman.store') }}" method="POST">
            @csrf
            <input type="text" name="judul" placeholder="Judul" value="Rapat Desa Test"><br><br>
            <textarea name="isi" placeholder="Isi">Ini isi pengumuman test dari form.</textarea><br><br>
            <select name="prioritas">
                <option value="biasa">Biasa</option>
                <option value="penting">Penting</option>
                <option value="urgent">Urgent</option>
            </select><br><br>
            <input type="date" name="tanggal_mulai" value="{{ date('Y-m-d') }}"><br><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</x-app-layout>