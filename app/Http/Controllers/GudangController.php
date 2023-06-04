<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
// use App\Http\Requests\StoreGudangRequest;
use App\Http\Requests\UpdateGudangRequest;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('gudang.index', [
            'gudangs' => Gudang::all(),
            'title' => 'Data Gudang Clo Warehouse'
        ]);
    }

    public function report()
    {
        //
        return view('gudang.report', [
            'gudangs' => Gudang::get(),
            'title' => 'Data Gudang Clo Warehouse'
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gudang.create');
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
            'nama_gudang' => 'required|min:5|unique:gudangs',
            'lokasi' => 'required'
        ], [
            'nama_gudang.required' => 'Nama gudang tidak boleh kosong!',
            'nama_gudang.unique' => 'Nama gudang sudah terdaftar!',
            'nama_gudang.min' => 'Nama gudang minimal 5 huruf!',
            'lokasi.required' => 'Lokasi tidak boleh kosong!',
        ]);
        // $gudang =[
        //     'nama_gudang' => $request->nama_gudang,
        //     'lokasi' => $request->lokasi,
        // ];
        Gudang::create($validated);
        session()->flash('success', 'Data Gudang Berhasil Disimpan!');
        return redirect()->route('gudang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function show(Gudang $gudang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gudang = Gudang::find($id);
        return view('gudang.edit', [
            'gudang' => $gudang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGudangRequest  $request
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gudang $gudang)
    {
        $rules = [
            'nama_gudang' => 'required|min:5',
            'lokasi' => 'required'
        ];
        if ($request->nama_gudang != $gudang->nama_gudang) {
            $rules['nama_gudang'] = 'required|min:5|unique:gudangs';
        };
        $validated = $request->validate($rules);
        Gudang::where('id_gudang', $gudang->id_gudang)->update($validated);
        return redirect('gudang')->with('success', 'Data Gudang Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Gudang::destroy($id);
        return redirect('gudang')->with('success', 'Data Gudang Berhasil Dihapus!');
    }
}
