<?php

namespace App\Http\Controllers;

use App\Models\Tenaga_Kerja;
use App\Http\Requests\StoreTenaga_KerjaRequest;
use App\Http\Requests\UpdateTenaga_KerjaRequest;
use App\Models\TenagaKerja;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;

class TenagaKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('tenagakerja.index',[
            'tenaga_kerjas' => TenagaKerja::all(),
            'title' => 'Data Tenaga kerja Clo Warehouse'
        ]);
    }

    public function report()
    {
        //
        return view('tenagakerja.report',[
            'tenaga_kerjas' => TenagaKerja::all(),
            'title' => 'Data Tenaga kerja Clo Warehouse'
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
        return view('tenagakerja.create');
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
            'nama_tenaga_kerja' => 'required|unique:tenaga_kerjas',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'gaji_tenaga_kerja' => 'required'
        ],[
            'nama_tenaga_kerja.required' => 'Nama tenaga kerja tidak boleh kosong!',
            'nama_tenaga_kerja.unique' => 'Nama tenaga kerja sudah terdaftar!',
            'jenis_kelamin.required' => 'Pilih jenis kelamin',
            'usia.required' => 'Usia tidak boleh kosong!',
            'gaji_tenaga_kerja.required' => 'Gaji tidak boleh kosong!'
        ]);
        TenagaKerja::create($validated);
        session()->flash('success', 'Data Tenaga Kerja Berhasil Disimpan!');
        return redirect()->route('tenagakerja.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenaga_Kerja  $tenaga_Kerja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenaga_Kerja  $tenaga_Kerja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tenaga_kerja = TenagaKerja::find($id);
        return view('tenagakerja.edit',[
            'tenaga_kerja' => $tenaga_kerja
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Tenaga_Kerja  $tenaga_Kerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'nama_tenaga_kerja' => 'required',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'gaji_tenaga_kerja' => 'required'
        ];
        $tenaga_kerja = TenagaKerja::find($id);
        if ($request->nama_tenaga_kerja != $tenaga_kerja->nama_tenaga_kerja) {
            $rules['nama_tenaga_kerja'] = 'required|unique:tenaga_kerjas';
        };
        
        $validated = $request->validate($rules);
        TenagaKerja::where('id_tenaga_kerja', $tenaga_kerja->id_tenaga_kerja)->update($validated);
        session()->flash('success', 'Data Tenaga Kerja Berhasil Diubah!');
        return redirect()->route('tenagakerja.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenaga_Kerja  $tenaga_Kerja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        TenagaKerja::destroy($id);
        return redirect('tenagakerja')->with('success', 'Data Tenaga Kerja Berhasil Dihapus!');
    }
}
