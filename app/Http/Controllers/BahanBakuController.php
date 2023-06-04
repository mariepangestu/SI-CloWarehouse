<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
// use App\Http\Requests\Request;
use App\Http\Requests\UpdateBahanBakuRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('bahanbaku.index',[
            'bahan_bakus' => BahanBaku::all(),
            'title' => 'Data Bahan Baku Clo Warehouse'
        ]);
        // $BahanBaku = BahanBaku::get();  //panggilModelBahanBaku
    }

    public function report()
    {
        //
        return view('bahanbaku.report', [
            'bahan_bakus' => BahanBaku::get(),
            'title' => 'Data Bahan Baku Clo Warehouse'
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
        return view('bahanbaku.create');
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
            'nama_bahan' => 'required',
            'jumlah_bahan' => 'required',
            'satuan_bahan' => 'required',
            'harga_bahan' => 'required'
        ],[
            'nama_bahan.required' => 'Nama bahan tidak boleh kosong!',
            'jumlah_bahan.required' => 'Jumlah bahan tidak boleh kosong!',
            'satuan_bahan.required' => 'Satuan bahan tidak boleh kosong!',
            'harga_bahan.required' => 'Harga bahan tidak boleh kosong!',
        ]);
        BahanBaku::create($validated);
        session()->flash('success', 'Data Bahan Baku Berhasil Disimpan!');
        return redirect()->route('bahanbaku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function show(BahanBaku $bahanBaku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bahanbaku = BahanBaku::find($id);
        return view('bahanbaku.edit',[
            'bahanbaku' => $bahanbaku
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBahanBakuRequest  $request
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'nama_bahan' => 'required',
            'jumlah_bahan' => 'required',
            'satuan_bahan' => 'required',
            'harga_bahan' => 'required'
        ];
        $bahanbaku= BahanBaku::find($id);
        if ($request->nama_bahan != $bahanbaku->nama_bahan) {
            $rules['nama_bahan'] = 'required|unique:bahan_bakus';
        };
        $validated = $request->validate($rules);
        BahanBaku::where('id_bahanbaku', $bahanbaku->id_bahanbaku)->update($validated);
        session()->flash('success', 'Data Bahan Baku Berhasil Diubah!');
        return redirect()->route('bahanbaku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        BahanBaku::destroy($id);
        session()->flash('success', 'Data Bahan Baku Berhasil Dihapus!');
        return redirect()->route('bahanbaku.index');
    }
}
