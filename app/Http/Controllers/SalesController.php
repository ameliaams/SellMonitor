<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sales;

class SalesController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sales = Sales::find($id);
        return view('sales.detail', compact('sales'));
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
}
