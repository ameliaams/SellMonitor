<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sales;
use App\Models\PaketLayanan;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::with(['sales', 'paketLayanan'])->get();
        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sales = Sales::all();
        $paketLayanan = PaketLayanan::all();
        return view('customer.create', compact('sales', 'paketLayanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_sales' => 'required|exists:sales,id',
            'id_paket' => 'required|exists:paket_layanan,id',
            'nama_customer' => 'required|max:50',
            'tgl_gabung' => 'required|date',
        ]);

        Customer::create($request->all());
        return redirect()->route('customer.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $sales = Sales::all();
        $paketLayanan = PaketLayanan::all();
        return view('customer.edit', compact('customer', 'sales', 'paketLayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'id_sales' => 'required|exists:sales,id',
            'id_paket' => 'required|exists:paket_layanan,id',
            'nama_customer' => 'required|max:50',
            'tgl_gabung' => 'required|date',
        ]);

        $customer->update($request->all());

        return redirect()->route('customer.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Data berhasil dihapus!');
    }
}
