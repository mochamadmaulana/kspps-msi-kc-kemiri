<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriRegistrasiAnggota extends Model
{
    use HasFactory;
    protected $table = "histori_registrasi_anggota";
    protected $guarded = [];

    function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
    function karyawan()
    {
        return $this->belongsTo(User::class,'karyawan_id','id');
    }
}
