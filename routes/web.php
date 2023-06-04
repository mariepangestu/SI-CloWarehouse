<?php

use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\BiayaProduksiController;
use App\Http\Controllers\StokProduksiController;
use App\Http\Controllers\TenagaKerjaController;
use App\Http\Controllers\PegawaiController;
use App\Models\Kategori_barang;
// use App\Models\Stok_barang;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard',function(){
    return view('dashboard');
})->name('dashboard'); 

Route::resource('barang', BarangController::class);

Route::resource('kategoribarang', KategoriBarangController::class);

Route::resource('stokbarang', StokBarangController::class);

Route::resource('gudang', GudangController::class);
// Route::controller(GudangController::class)->prefix('gudang')->group(function(){
//     Route::get('','index')->name('gudang');
//     Route::get('create','create')->name('gudang.create');
//     Route::post('create','store')->name('gudang.create.store');
//     Route::get('update/{id}','update')->name('gudang.update');
//     Route::get('destroy/{id}','destroy')->name('gudang.destroy');
// });
Route::resource('bahanbaku', BahanBakuController::class);

Route::resource('outlet', OutletController::class);

Route::resource('produksi', ProduksiController::class);

Route::resource('biayaproduksi', BiayaProduksiController::class);

Route::resource('tenagakerja', TenagaKerjaController::class);

Route::resource('stokproduksi', StokProduksiController::class);

Route::resource('pegawai', PegawaiController::class);

Route::get('report-gudang', [GudangController::class,'report'])->name('gudang.report');
Route::get('report-outlet', [OutletController::class,'report'])->name('outlet.report');
Route::get('report-pegawai', [PegawaiController::class,'report'])->name('pegawai.report');
Route::get('report-tenagakerja', [TenagaKerjaController::class,'report'])->name('tenagakerja.report');
Route::get('report-barang', [BarangController::class,'report'])->name('barang.report');
Route::get('report-kategoribarang', [KategoriBarangController::class,'report'])->name('kategoribarang.report');
Route::get('report-stokbarang', [StokBarangController::class,'report'])->name('stokbarang.report');
Route::get('report-produksi', [ProduksiController::class,'report'])->name('produksi.report');
Route::get('report-biayaproduksi', [BiayaProduksiController::class,'report'])->name('biayaproduksi.report');
Route::get('report-bahanbaku', [BahanBakuController::class,'report'])->name('bahanbaku.report');
Route::get('report-stokproduksi', [StokProduksiController::class,'report'])->name('stokproduksi.report');


