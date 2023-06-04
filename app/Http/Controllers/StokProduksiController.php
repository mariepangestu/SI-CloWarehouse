<?php

namespace App\Http\Controllers;

use App\Models\StokProduksi;
use App\Http\Requests\StoreStok_ProduksiRequest;
use App\Http\Requests\UpdateStok_ProduksiRequest;
use App\Models\Barang;
use App\Models\Gudang;
use App\Models\Produksi;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class StokProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('stokproduksi.index',[
            'stokproduksis' => StokProduksi::with('barang','gudang')->get(),
            'title' => 'Data Stok Produksi Clo Warehouse'
        ]);
    }

    public function report()
    {
        //
        return view('stokproduksi.report',[
            'stokproduksis' => StokProduksi::with('barang','gudang')->get(),
            'title' => 'Data Stok Produksi Clo Warehouse'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barang = Barang::all();
        $gudang = Gudang::all();
        return view('stokproduksi.create',compact('barang','gudang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStokProduksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'id_barang' => 'required',
            'id_gudang' => 'required',
            'jumlah_stok' => 'required'
        ],[
            'id_barang.required' => 'Narang tidak boleh kosong!',
            'id_gudang.required' => 'Nama gudang tidak boleh kosong!',
            'jumlah_stok.required' => 'jumlah stok tidak boleh kosong!',
        ]);
        StokProduksi::create($validated);
        session()->flash('success', 'Data Stok Produksi Berhasil Disimpan!');
        return redirect()->route('stokproduksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stok_Produksi  $stok_Produksi
     * @return \Illuminate\Http\Response
     */
    public function show(StokProduksi $stok_Produksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stok_Produksi  $stok_Produksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $stokproduksi = StokProduksi::find($id);
        $barang = Barang::all();
        $gudang = Gudang::all();
        return view('stokproduksi.edit',[
            'stokproduksis' => $stokproduksi
        ],compact('barang','gudang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStok_ProduksiRequest  $request
     * @param  \App\Models\Stok_Produksi  $stok_Produksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StokProduksi $stokproduksi)
    {
        //
        $rules = [
            'id_barang' => 'required',
            'id_gudang' => 'required',
            'jumlah_stok' => 'required'
        ];
        if ($request->id_stok_produksi != $stokproduksi->id_stok_produksi) {
            $rules['id_stok_produksi'] = 'required|unique:stok_produksis';
        };
        $validated = $request->validate($rules);
        StokProduksi::where('id_stok_produksi', $stokproduksi->id_stok_produksi)->update($validated);
        session()->flash('success', 'Data Stok Produksi Berhasil Diubah!');
        return redirect()->route('stokproduksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stok_Produksi  $stok_Produksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        StokProduksi::destroy($id);
        session()->flash('success', 'Data Stok Produksi Berhasil Dihapus!');
        return redirect()->route('stokproduksi.index');
    }
}
