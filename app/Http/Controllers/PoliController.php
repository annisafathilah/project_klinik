<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    // Tampilkan semua data poli
    public function index()
    {
        $polis = Poli::all();
        return view('poli_index', compact('polis'));
    }

    // Form tambah poli
    public function create()
    {
        return view('poli_create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'biaya' => 'required|integer',
        ]);

        Poli::create($request->only('nama', 'biaya'));

        return redirect()->route('poli.index')->with('pesan', 'Data poli berhasil ditambahkan!');
    }

    // Form edit poli
    public function edit(Poli $poli)
    {
        return view('poli_edit', compact('poli'));
    }

    // Update data poli
    public function update(Request $request, Poli $poli)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'biaya' => 'required|integer',
        ]);

        $poli->update($request->only('nama', 'biaya'));

        return redirect()->route('poli.index')->with('pesan', 'Data poli berhasil diupdate!');
    }

    // Hapus data poli
    public function destroy(Poli $poli)
    {
        $poli->delete();

        return redirect()->route('poli.index')->with('pesan', 'Data poli berhasil dihapus!');
    }
}
