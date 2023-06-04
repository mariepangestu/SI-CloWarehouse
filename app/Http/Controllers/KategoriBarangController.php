<?php

namespace App\Http\Controllers;

use App\Models\Kategori_barang;
// use App\Http\Requests\Request;
use App\Http\Requests\UpdateKategori_barangRequest;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('kategoribarang.index',[
            'kategori_barangs' => Kategori_Barang::all(),
            'title' => 'Data Kategori Barang Clo Warehouse'
        ]);
    }

    public function report()
    {
        //
        return view('kategoribarang.report',[
            'kategori_barangs' => Kategori_Barang::get(),
            'title' => 'Data Kategori Barang Clo Warehouse'
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
        return view('kategoribarang.create');
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
            'nama_kategori' => 'required|unique:kategori_barangs'
        ],[
            'nama_kategori.required' => 'Nama Kategori tidak boleh kosong!',
            'nama_gudang.unique' => 'Nama gudang sudah terdaftar!',
        ]);
        // $gudang =[
        //     'nama_gudang' => $request->nama_gudang,
        //     'lokasi' => $request->lokasi,
        // ];
        Kategori_barang::create($validated);
        session()->flash('success', 'Data Kategori Barang Berhasil Disimpan!');
        return redirect()->route('kategoribarang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori_barang  $kategori_barang
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori_barang $kategori_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori_barang  $kategori_barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kategori_barang = Kategori_barang::find($id);
        return view('kategoribarang.edit',[
            'kategori_barang' => $kategori_barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Kategori_barang  $kategori_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'nama_kategori' => 'required'
        ];
        $kategori_barang = Kategori_barang::find($id);
        if ($request->nama_kategori != $kategori_barang->nama_kategori) {
            $rules['nama_kategori'] = 'required|unique:kategori_barangs';
        };
        $validated = $request->validate($rules);
        Kategori_barang::where('id_kategori_barang', $kategori_barang->id_kategori_barang)->update($validated);
        session()->flash('success', 'Data Kategori Barang Berhasil Diubah!');
        return redirect()->route('kategoribarang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori_barang  $kategori_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Kategori_barang::destroy($id);
        session()->flash('success', 'Data Kategori Barang Berhasil Dihapus!');
        return redirect()->route('kategoribarang.index');
    }
}
