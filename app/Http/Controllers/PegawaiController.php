<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
// use App\Http\Requests\Request;
use App\Http\Requests\UpdatePegawaiRequest;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pegawai.index',[
            'pegawais' => Pegawai::all(),
            'title' => 'Data Pegawai Clo Warehouse'
        ]);
    }
    
    public function report()
    {
        //
        return view('pegawai.report', [
            'pegawais' => Pegawai::get(),
            'title' => 'Data Pegawai Clo Warehouse'
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
        return view('pegawai.create');
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
        // dd($request);
        $validated = $request->validate([
            'nama_pegawai' => 'required|unique:pegawais',
            'umur' => 'required',
            'jenis_kelamin' => 'required'
        ],[
            'nama_pegawai.required' => 'Nama pegawai tidak boleh kosong!',
            'nama_pegawai.unique' => 'Nama pegawai sudah terdaftar!',
            'umur.required' => 'Usia tidak boleh kosong!',
            'jenis_kelamin.required' => 'Pilih jenis kelamin',
        ]);
        Pegawai::create($validated);
        session()->flash('success', 'Data Pegawai Berhasil Disimpan!');
        return redirect()->route('pegawai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pegawai = Pegawai::find($id);
        // dd($pegawai);
        return view('pegawai.edit',[
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $rules = [
            'nama_pegawai' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required'
        ];
        $pegawai=Pegawai::find($id);
        if ($request->nama_pegawai != $pegawai->nama_pegawai) {
            $rules['nama_pegawai'] = 'required|unique:pegawais';
        };
        $validated = $request->validate($rules);
        Pegawai::where('id_pegawai', $pegawai->id_pegawai)->update($validated);
        return redirect('pegawai')->with('success', 'Data Pegawai Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Pegawai::destroy($id);
        return redirect('pegawai')->with('success', 'Data Pegawai Berhasil Dihapus!');
    }
}
