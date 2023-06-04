<?php

namespace App\Http\Controllers;

use App\Models\Stok_barang;
use App\Http\Requests\StoreStok_barangRequest;
use App\Http\Requests\UpdateStok_barangRequest;
use App\Models\Barang;
use Illuminate\Http\Request;

class StokBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('stokbarang.index',[
            'stok_barangs' => Stok_barang::with('barang')->get(),
            'title' => 'Data Stok Barang Clo Warehouse'
        ]);
    }

    public function report()
    {
        //
        return view('stokbarang.report',[
            'stok_barangs' => Stok_barang::with('barang')->get(),
            'title' => 'Data Stok Barang Clo Warehouse'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('stokbarang.create',compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'id_barang' => 'required',
            'Jumlah_stok' => 'required'
        ],[
            'id_barang.required' => 'id barang tidak boleh kosong!',
            'Jumlah_stok.required' => 'jumlah stok tidak boleh kosong!',
        ]);
        Stok_barang::create($validated);
        session()->flash('success', 'Data Stok Barang Berhasil Disimpan!');
        return redirect()->route('stokbarang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stok_barang  $stok_barang
     * @return \Illuminate\Http\Response
     */
    public function show(Stok_barang $stok_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stok_barang  $stok_barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $stok_barang = Stok_barang::find($id);
        $barang = Barang::all();
        return view('stokbarang.edit',[
            'stok_barang' => $stok_barang
        ],compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Stok_barang  $stok_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'id_barang' => 'required',
            'Jumlah_stok' => 'required'
        ];
        $stok_barang = Stok_barang::find($id);
        if ($request->id_barang != $stok_barang->id_barang) {
            $rules['id_barang'] = 'required|unique:barangs';
        };
        $validated = $request->validate($rules);
        Stok_barang::where('id_stok_barang', $stok_barang->id_stok_barang)->update($validated);
        session()->flash('success', 'Data Stok Barang Berhasil Diubah!');
        return redirect()->route('stokbarang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stok_barang  $stok_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Stok_barang::destroy($id);
        session()->flash('success', 'Data Stok Barang Berhasil Dihapus!');
        return redirect()->route('stokbarang.index');
    }
}
