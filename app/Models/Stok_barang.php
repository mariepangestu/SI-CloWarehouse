<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok_barang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_stok_barang';
    protected $table = 'stok_barangs';
    protected $fillable = ['id_barang', 'Jumlah_stok'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
}
