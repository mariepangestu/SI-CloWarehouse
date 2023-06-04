<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKerja extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tenaga_kerja';
    protected $table = 'tenaga_kerjas';
    protected $fillable = ['nama_tenaga_kerja','jenis_kelamin','usia','gaji_tenaga_kerja'];

    public function biaya_produksi()
    {
        return $this->hasMany(BiayaProduksi::class);
    }
}
