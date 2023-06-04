<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_barang';
    protected $table = 'barangs';
    protected $fillable = ['id_kategori_barang', 'nama_barang', 'harga_barang'];

    public function kategori_barang()
    {
        return $this->belongsTo(Kategori_barang::class, 'id_kategori_barang', 'id_kategori_barang');
    }
    
    public function stok_barang()
    {
        return $this->hasMany(Stok_barang::class);
    }

    public function outlet()
    {
        return $this->hasMany(Outlet::class);
    }

    public function produksi()
    {
        return $this->hasMany(Produksi::class);
    }
}
