<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Tampilkan daftar layanan (publik)
     */
    public function index()
    {
        $layanans = Layanan::orderBy('nama_layanan')->get();
        return view('layanan.index', compact('layanans'));
    }

    /**
     * Tampilkan detail 1 layanan (publik)
     */
    public function show(Layanan $layanan)
    {
        return view('layanan.show', compact('layanan'));
    }

    /**
     * Tampilkan form tambah (admin)
     */
    public function create()
    {
        return view('layanan.create');
    }

    /**
     * Simpan data baru (admin)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'syarat' => 'nullable|string',
            'alur_pengajuan' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
        ]);

        Layanan::create($validated);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit (admin)
     */
    public function edit(Layanan $layanan)
    {
        return view('layanan.edit', compact('layanan'));
    }

    /**
     * Update data (admin)
     */
    public function update(Request $request, Layanan $layanan)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'syarat' => 'nullable|string',
            'alur_pengajuan' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
        ]);

        $layanan->update($validated);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Hapus data (admin)
     */
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}