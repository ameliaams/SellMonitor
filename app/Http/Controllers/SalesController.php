<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sales;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salesId = Auth::id();
        return view('home', ['sales' => $salesId]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $sales = Auth::user();
        return view('profile', compact('sales'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sales)
    {
        return view('edit-profile', compact('sales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sales $sales)
    {
        $request->validate([
            'nama_sales' => 'required|max:50',
        ]);

        $sales->update($request->only('nama_sales'));

        return redirect()->route('profiles')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Generate a bar chart of customers per month.
     */
    public function barChart()
    {
        $id_sales = Auth::id();

        $salesData = DB::table('customer')
            ->selectRaw('MONTHNAME(tgl_gabung) as month, COUNT(*) as total')
            ->where('id_sales', $id_sales)
            ->groupBy('month')
            ->orderByRaw('MONTH(tgl_gabung)')
            ->pluck('total', 'month');

        return view('home', [
            'sales' => $salesData,
            'months' => $salesData->keys(),
            'customerCounts' => $salesData->values(),
        ]);
    }
}
