<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{

    public function index()
    {
        $profilDesas = ProfilDesa::latest()->get();
        return view('profil-desa.index', compact('profilDesas'));
    }

    public function create()
    {
        return view('profil-desa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'luas_wilayah' => 'required|numeric',
            'jumlah_dusun' => 'required|integer',
            'jumlah_rw' => 'required|integer',
            'jumlah_rt' => 'required|integer',
            'jumlah_penduduk' => 'required|integer',
            'jumlah_laki_laki' => 'required|integer',
            'jumlah_perempuan' => 'required|integer',
            'mata_pencaharian' => 'required|string',
            'batas_wilayah' => 'required|string',
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logo-desa', 'public');
        }

        ProfilDesa::create($validated);

        return redirect()->route('profil-desa.index')->with('success', 'Profil desa berhasil ditambahkan.');
    }

    public function show(ProfilDesa $profilDesa)
    {
        return view('profil-desa.show', compact('profilDesa'));
    }

    public function edit(ProfilDesa $profilDesa)
    {
        return view('profil-desa.edit', compact('profilDesa'));
    }

    public function update(Request $request, ProfilDesa $profilDesa)
    {
        $validated = $request->validate([
            'nama_desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'luas_wilayah' => 'required|numeric',
            'jumlah_dusun' => 'required|integer',
            'jumlah_rw' => 'required|integer',
            'jumlah_rt' => 'required|integer',
            'jumlah_penduduk' => 'required|integer',
            'jumlah_laki_laki' => 'required|integer',
            'jumlah_perempuan' => 'required|integer',
            'mata_pencaharian' => 'required|string',
            'batas_wilayah' => 'required|string',
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logo-desa', 'public');
        }

        $profilDesa->update($validated);

        return redirect()->route('profil-desa.index')->with('success', 'Profil desa berhasil diperbarui.');
    }

    public function destroy(ProfilDesa $profilDesa)
    {
        $profilDesa->delete();

        return redirect()->route('profil-desa.index')->with('success', 'Profil desa berhasil dihapus.');
    }
}