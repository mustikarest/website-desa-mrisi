<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();
        return view('kontak.index', compact('kontak'));
    }

    public function edit()
    {
        $kontak = Kontak::first();
        return view('kontak.edit', compact('kontak'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'alamat_kantor' => 'required|string',
            'no_telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'latitude_kantor' => 'nullable|numeric',
            'longitude_kantor' => 'nullable|numeric',
        ]);

        Kontak::updateOrCreate(
            ['id' => 1],
            $validated
        );

        return redirect()->route('kontak.index')->with('success', 'Info kontak berhasil diperbarui.');
    }
}