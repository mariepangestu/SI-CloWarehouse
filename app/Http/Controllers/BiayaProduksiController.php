<?php

namespace App\Http\Controllers;

use App\Models\BiayaProduksi;
use App\Http\Requests\StoreBiayaProduksiRequest;
use App\Http\Requests\UpdateBiayaProduksiRequest;
use App\Models\BahanBaku;
use App\Models\TenagaKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiayaProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('biayaproduksi.index',[
            'biayaproduksis' => BiayaProduksi::with('bahan_baku','tenaga_kerja')->get(),
            'title' => 'Data Biaya Produksi Clo Warehouse'
        ]);
    }

    public function report()
    {
        //
        return view('biayaproduksi.report',[
            'biayaproduksis' => BiayaProduksi::with('bahan_baku','tenaga_kerja')->get(),
            'title' => 'Data Biaya Produksi Clo Warehouse'
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
        $bahanbaku = BahanBaku::all();
        $tenagakerja = TenagaKerja::all();
        return view('biayaproduksi.create',compact('bahanbaku','tenagakerja'));
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
            'id_bahanbaku' => 'required',
            'id_tenaga_kerja' => 'required',
            'total_biaya' => 'required'
        ],[
            'id_bahanbaku.required' => 'Bahan baku tidak boleh kosong!',
            'id_tenaga_kerja.required' => 'Tenaga kerja tidak boleh kosong!',
            'total_biaya.required' => 'Total biaya tidak boleh kosong!',
        ]);
        BiayaProduksi::create($validated);
        session()->flash('success', 'Data Biaya Produksi Berhasil Disimpan!');
        return redirect()->route('biayaproduksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biaya_Produksi  $biaya_Produksi
     * @return \Illuminate\Http\Response
     */
    public function show(BiayaProduksi $biaya_Produksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biaya_Produksi  $biaya_Produksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biayaproduksi = BiayaProduksi::find($id);
        $bahanbaku = BahanBaku::all();
        $tenagakerja = TenagaKerja::all();
        return view('biayaproduksi.edit',[
            'biayaproduksi' => $biayaproduksi
        ],compact('bahanbaku','tenagakerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBiaya_ProduksiRequest  $request
     * @param  \App\Models\Biaya_Produksi  $biaya_Produksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BiayaProduksi $biayaproduksi)
    {

        $rules = [
            'id_bahanbaku' => 'required',
            'id_tenaga_kerja' => 'required',
            'total_biaya' => 'required'
        ];
        if ($request->id_biaya_produksi != $biayaproduksi->id_biaya_produksi) {
            $rules['id_biaya_produksi'] = 'required|unique:biaya_produksis';
        };
        $validated = $request->validate($rules);
        BiayaProduksi::where('id_biaya_produksi', $biayaproduksi->id_biaya_produksi)->update($validated);
        session()->flash('success', 'Data Biaya Produksi Berhasil Diubah!');
        return redirect()->route('biayaproduksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biaya_Produksi  $biaya_Produksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        BiayaProduksi::destroy($id);
        return redirect('biayaproduksi')->with('success', 'Data Biaya Produksi Berhasil Dihapus!');
    }

//     public function total(){
//         $total = DB ::table('biaya_produksis')
//                 ->select(DB::raw('SUM('))
//     }
}
