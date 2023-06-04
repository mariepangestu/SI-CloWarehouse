<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Http\Requests\StoreOutletRequest;
use App\Http\Requests\UpdateOutletRequest;
use App\Models\Barang;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('outlet.index', [
            'outlets' => outlet::with('pegawai','barang')->get(),
            'title' => 'Data Outlet Clo Warehouse'
        ]);
    }

    public function report()
    {
        //
        return view('outlet.report', [
            'outlets' => outlet::with('pegawai','barang')->get(),
            'title' => 'Data Outlet Clo Warehouse'
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
        $pegawai = Pegawai::all();
        $barang = Barang::all();
        return view('outlet.create',compact('pegawai','barang'));
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
            'id_pegawai' => 'required',
            'id_barang' => 'required',
            'nama_outlet' => 'required',
            'lokasi_outlet' => 'required'
        ],[
            'id_pegawai.required' => 'Nama pegawai tidak boleh kosong!',
            'id_barang.required' => 'Nama barang tidak boleh kosong!',
            'nama_outlet.required' => 'Nama outlet tidak boleh kosong!',
            'harga_outlet.required' => 'Lokasi outlet tidak boleh kosong!',
        ]);
       // dd($request);
        Outlet::create($validated);
        session()->flash('success', 'Data Outle Berhasil Disimpan!');
        return redirect()->route('outlet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        $pegawai = Pegawai::all();
        $barang = Barang::all();
        return view('outlet.edit',[
            'outlet' => $outlet
        ],compact('pegawai','barang')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOutletRequest  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        //
        $rules = [
            'id_pegawai' => 'required',
            'id_barang' => 'required',
            'nama_outlet' => 'required',
            'lokasi_outlet' => 'required'
        ];
        if ($request->nama_outlet != $outlet->nama_outlet) {
            $rules['nama_outlet'] = 'required|unique:outlets';
        };
        $validated = $request->validate($rules);
        Outlet::find($outlet->id_outlet)->update($validated);
        return redirect('outlet')->with('success', 'Data Outlet Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Outlet::destroy($id);
        return redirect('outlet')->with('success', 'Data Outlet Berhasil Dihapus!');
    }
}
