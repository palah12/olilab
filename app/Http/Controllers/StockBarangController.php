<?php

namespace App\Http\Controllers;

use App\Models\stock_barang;
use Illuminate\Http\Request;

class StockBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock_barang = stock_barang::all();
        return view('stock_barang.index', compact('stock_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock_barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barangmasuk' => 'required',
            'nama_barangkeluar' => 'required',
            'jumlah' => 'required',
        ]);

        $stock = new stock_barang;
        $stock->nama_barangmasuk = $request->nama_barangmasuk;
        $stock->nama_barangkeluar = $request->nama_barangkeluar;
        $stock->jumlah = $request->jumlah;
        $stock->save();
        return redirect()->route('stock_barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stock_barang  $stock_barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = stock_barang::findOrFail($id);
        return view('stock_barang.show', compact('stock_barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\stock_barang  $stock_barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = stock::findOrFail($id);
        return view('stock_barang.edit', compact('stock_barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stock_barang  $stock_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stock_barang $stock_barang, $id)
    {
        $validated = $request->validate([
            'nama_barangmasuk' => 'required',
            'nama_barangkeluar' => 'required',
            'jumlah' => 'required',
        ]);

        $stock = new stock_barang;
        $stock->nama_barangmasuk = $request->nama_barangmasuk;
        $stock->nama_barangkeluar = $request->nama_barangkeluar;
        $stock->jumlah = $request->jumlah;
        $stock->save();
        return redirect()->route('stock_barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stock_barang  $stock_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = stock_barang::findOrFail($id);
        $stock->delete();
        return redirect()->route('stock_barang.index');
    }
}
