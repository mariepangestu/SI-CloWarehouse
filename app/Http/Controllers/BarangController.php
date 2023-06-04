<?php

namespace App\Http\Controllers;

use App\Models\Barang;
// use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Kategori_barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('barang.index',[
            'barangs' => Barang::with('kategori_barang')->get(),
            'title' => 'Data Barang Clo Warehouse'
        ]);
    }

    public function report()
    {
        return view('barang.report', [
            'barangs' => Barang::with('kategori_barang')->get(),
            'title' => 'Data Barang Clo Warehouse'
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
        $kategori_barang = Kategori_barang::all();
        return view('barang.create',compact('kategori_barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kategori_barang' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required'
        ],[
            'id_kategori_barang.required' => 'ID barang tidak boleh kosong!',
            'nama_barang.required' => 'Nama barang tidak boleh kosong!',
            'harga_barang.required' => 'Harga barang tidak boleh kosong!',
        ]);
        Barang::create($validated);
        session()->flash('success', 'Data Barang Berhasil Disimpan!');
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $barang = Barang::find($id);
        $kategori_barang = Kategori_barang::all();
        return view('barang.edit',[
            'barang' => $barang
        ],compact('kategori_barang')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $rules = [
            'id_kategori_barang' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required'
        ];
        $barang = Barang::find($id);
        if ($request->nama_barang != $barang->nama_barang) {
            $rules['nama_barang'] = 'required|unique:barangs';
        };
        $validated = $request->validate($rules);
        Barang::find($barang->id_barang)->update($validated);
        return redirect('barang')->with('success', 'Data Barang Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Barang::destroy($id);
        return redirect('barang')->with('success', 'Data Barang Berhasil Dihapus!');
    }
    
}
