<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_barang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kategori_barang';
    protected $table = 'kategori_barangs';
    protected $fillable = ['nama_kategori'];
    
    public function barang(){
        return $this->hasMany(Barang::class);
    }
}