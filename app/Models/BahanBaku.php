<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_bahanbaku';
    protected $table = 'bahan_bakus';
    protected $fillable = ['nama_bahan','jumlah_bahan','satuan_bahan','harga_bahan'];

    public function biaya_produksi()
    {
        return $this->hasMany(BiayaProduksi::class);
    }
}
