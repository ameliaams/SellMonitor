<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Sales;
use App\Models\PaketLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
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
        $customers = Customer::with(['paketLayanan'])
            ->where('id_sales', Auth::id())
            ->get();
        return view('customer', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-customer', [
            'sales' => Sales::all(),
            'paketLayanan' => PaketLayanan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|exists:paket_layanan,id',
            'nama_customer' => 'required|max:50',
            'tgl_gabung' => 'required|date',
        ]);

        Customer::create([
            'id_sales' => Auth::id(),
            'id_paket' => $request->nama_paket,
            'nama_customer' => $request->nama_customer,
            'tgl_gabung' => $request->tgl_gabung,
        ]);

        return redirect()->route('customers.index')->with('success', 'Data berhasil ditambah!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('edit-customer', [
            'customer' => $customer,
            'sales' => Sales::all(),
            'paketLayanan' => PaketLayanan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'id_paket' => 'required|exists:paket_layanan,id',
            'nama_customer' => 'required|max:50',
            'tgl_gabung' => 'required|date',
        ]);

        $customer->update($request->only(['id_paket', 'nama_customer', 'tgl_gabung']));

        return redirect()->route('customers.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Data berhasil dihapus!');
    }
}
