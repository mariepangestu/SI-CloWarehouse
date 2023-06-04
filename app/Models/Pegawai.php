<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pegawai';
    protected $table = 'pegawais';
    protected $fillable = ['nama_pegawai','umur','jenis_kelamin'];

    public function outlet()
    {
        return $this->hasMany(Outlet::class);
    }
}
