<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokProduksi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_stok_produksi';
    protected $table = 'stok_produksis';
    protected $fillable = ['id_barang','id_gudang', 'jumlah_stok'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'id_gudang', 'id_gudang');
    }
}
