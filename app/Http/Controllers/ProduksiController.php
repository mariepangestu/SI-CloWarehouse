<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Http\Requests\StoreProduksiRequest;
use App\Http\Requests\UpdateProduksiRequest;
use App\Models\Barang;
use App\Models\BiayaProduksi;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('produksi.index',[
            'produksis' => Produksi::with('barang','biayaproduksi')->get(),
            'title' => 'Data Produksi Clo Warehouse'
        ]);
    }

    public function report()
    {
        //
        return view('produksi.report',[
            'produksis' => Produksi::with('barang','biayaproduksi')->get(),
            'title' => 'Data Produksi Clo Warehouse'
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
        $biayaproduksi = BiayaProduksi::all();
        return view('produksi.create',compact('barang','biayaproduksi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProduksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'id_barang' => 'required',
            'id_biaya_produksi' => 'required',
            'jumlah_produksi' => 'required',
            'tgl_produksi' => 'required'
        ],[
            'id_barang.required' => 'Nama barang tidak boleh kosong!',
            'id_biaya_produksi.required' => 'Biaya produksi tidak boleh kosong!',
            'jumlah_produksi.required' => 'Jumlah produksi tidak boleh kosong!',
            'tgl_produksi.required' => 'Tanggal produksi tidak boleh kosong!',
        ]);
       // dd($request);
        Produksi::create($validated);
        session()->flash('success', 'Data Produksi Berhasil Disimpan!');
        return redirect()->route('produksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function show(Produksi $produksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $barang = Barang::all();
        $biayaproduksi = BiayaProduksi::all();
        $produksi = Produksi::find($id);
        return view('produksi.edit', [
            'produksi' => $produksi
        ],compact('barang','biayaproduksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProduksiRequest  $request
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produksi $produksi)
    {
        //
        $rules = [
            'id_barang' => 'required',
            'id_biaya_produksi' => 'required',
            'jumlah_produksi' => 'required',
            'tgl_produksi' => 'required'
        ];
        if ($request->id_barang != $produksi->id_barang) {
            $rules['id_barang'] = 'required|unique:produksis';
        };
        $validated = $request->validate($rules);
        Produksi::find($produksi->id_produksi)->update($validated);
        return redirect('produksi')->with('success', 'Data Produksi Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Produksi::destroy($id);
        session()->flash('success', 'Data Produksi Berhasil Dihapus!');
        return redirect()->route('produksi.index');
    }
}
