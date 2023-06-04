<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produksi';
    protected $table = 'produksis';
    protected $fillable = ['id_barang', 'id_biaya_produksi','jumlah_produksi', 'tgl_produksi'];
    

    public function stokproduksi()
    {
        return $this->hasMany(StokProduksi::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function biayaproduksi()
    {
        return $this->belongsTo(BiayaProduksi::class, 'id_biaya_produksi', 'id_biaya_produksi');
    }
}
