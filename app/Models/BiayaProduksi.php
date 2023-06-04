<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaProduksi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_biaya_produksi';
    protected $table = 'biaya_produksis';
    protected $fillable = ['id_bahanbaku', 'id_tenaga_kerja', 'total_biaya'];

    public function bahan_baku()
    {
        return $this->belongsTo(BahanBaku::class, 'id_bahanbaku', 'id_bahanbaku')->withDefault();
    }

    public function tenaga_kerja()
    {
        return $this->belongsTo(TenagaKerja::class, 'id_tenaga_kerja', 'id_tenaga_kerja')->withDefault();
    }
}
