<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sales;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sales::all();
        return view('home', compact('sales'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $sales = Auth::user();
        return view('profil', ['sales' => $sales]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sales = Sales::find($id);
        return view('sales.edit', compact('sales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:50',
        ]);

        $sales = Sales::find($id);

        if ($sales) {
            $sales->name = $request->input('name');
            $sales->save();
            return redirect()->route('sales.edit', $id)->with('success', 'Profile berhasil diperbarui!');
        } else {
            return redirect()->route('sales.index')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function barChart()
    {
        $idSales = Auth::id(); // Mengambil ID sales dari pengguna yang sedang login

        // Ambil data customer berdasarkan ID sales
        $sales = DB::table('customer')
            ->selectRaw('MONTHNAME(tgl_gabung) as month, COUNT(*) as total')
            ->where('id_sales', $idSales) // Filter berdasarkan ID sales
            ->groupBy('month')
            ->orderByRaw('MONTH(tgl_gabung)')
            ->pluck('total', 'month');

        return view('home', [
            'sales' => $sales,
            'months' => $sales->keys(),
            'customerCounts' => $sales->values()
        ]);
    }
}
