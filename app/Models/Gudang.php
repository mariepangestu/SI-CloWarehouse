<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_gudang';
    protected $table ='gudangs';
    protected $fillable = ['nama_gudang','lokasi'];

    public function stokproduksi()
    {
        return $this->hasMany(StokProduksi::class);
    }
}
