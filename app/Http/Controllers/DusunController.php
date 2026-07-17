<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use Illuminate\Http\Request;

class DusunController extends Controller
{

    public function index()
    {
        $dusuns = Dusun::latest()->get();
        return view('dusun.index', compact('dusuns'));
    }

    public function create()
    {
        return view('dusun.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dusun' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'potensi' => 'nullable|string',
        ]);

        Dusun::create($validated);

        return redirect()->route('dusun.index')->with('success', 'Dusun berhasil ditambahkan.');
    }

    public function show(Dusun $dusun)
    {
        $dusun->load('petas'); // eager load relasi peta
        return view('dusun.show', compact('dusun'));
    }

    public function edit(Dusun $dusun)
    {
        return view('dusun.edit', compact('dusun'));
    }

    public function update(Request $request, Dusun $dusun)
    {
        $validated = $request->validate([
            'nama_dusun' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'potensi' => 'nullable|string',
        ]);

        $dusun->update($validated);

        return redirect()->route('dusun.index')->with('success', 'Dusun berhasil diperbarui.');
    }

    public function destroy(Dusun $dusun)
    {
        
        if ($dusun->petas()->exists()) {
            return redirect()->route('dusun.index')
                ->with('error', 'Dusun tidak bisa dihapus karena masih memiliki data titik lokasi di peta.');
        }

        $dusun->delete();

        return redirect()->route('dusun.index')->with('success', 'Dusun berhasil dihapus.');
    }
}