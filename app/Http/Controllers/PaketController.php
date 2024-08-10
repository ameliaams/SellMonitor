<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketLayanan;

class PaketLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paketLayanan = PaketLayanan::all();
        return view('paket.index', compact('paketLayanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|max:50',
            'deskripsi' => 'required',
            'harga' => 'required|max:50',
        ]);

        PaketLayanan::create($request->all());

        return redirect()->route('paket.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaketLayanan $paketLayanan)
    {
        return view('paket.show', compact('paketLayanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaketLayanan $paketLayanan)
    {
        return view('paket.edit', compact('paketLayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaketLayanan $paketLayanan)
    {
        $request->validate([
            'nama_paket' => 'required|max:50',
            'deskripsi' => 'required',
            'harga' => 'required|max:50',
        ]);

        $paketLayanan->update($request->all());

        return redirect()->route('paket.index')->with('success', '  Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketLayanan $paketLayanan)
    {
        $paketLayanan->delete();
        return redirect()->route('paket.index')->with('success', 'Data berhasil dihapus!');
    }
}
