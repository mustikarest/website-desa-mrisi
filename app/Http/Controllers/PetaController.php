<?php

namespace App\Http\Controllers;

use App\Models\Peta;
use App\Models\Dusun;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index()
    {
        $petas = Peta::with('dusun')->get();
        return view('peta.index', compact('petas'));
    }

    public function create()
    {
        $dusuns = Dusun::all();
        return view('peta.create', compact('dusuns'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'kategori' => 'required|in:pemukiman,sekolah,umkm,pertanian,peternakan,fasilitas_kesehatan,tempat_ibadah,wisata_alam',
            'dusun_id' => 'required|exists:dusuns,id',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'deskripsi' => 'nullable|string',
        ]);

        Peta::create($validated);

        return redirect()->route('peta.index')->with('success', 'Titik lokasi berhasil ditambahkan.');
    }

    public function show(Peta $peta)
    {
        $peta->load('dusun');
        return view('peta.show', compact('peta'));
    }

    public function edit(Peta $peta)
    {
        $dusuns = Dusun::all();
        return view('peta.edit', compact('peta', 'dusuns'));
    }

    public function update(Request $request, Peta $peta)
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'kategori' => 'required|in:pemukiman,sekolah,umkm,pertanian,peternakan,fasilitas_kesehatan,tempat_ibadah,wisata_alam',
            'dusun_id' => 'required|exists:dusuns,id',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'deskripsi' => 'nullable|string',
        ]);

        $peta->update($validated);

        return redirect()->route('peta.index')->with('success', 'Titik lokasi berhasil diperbarui.');
    }

    public function destroy(Peta $peta)
    {
        $peta->delete();

        return redirect()->route('peta.index')->with('success', 'Titik lokasi berhasil dihapus.');
    }

    public function apiData()
    {
        $petas = Peta::with('dusun')->get();
        return response()->json($petas);
    }
}