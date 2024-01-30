<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasanganAnggota extends Model
{
    use HasFactory;
    protected $table = "pasangan_anggota";
    protected $guarded = [];

    function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
    function usaha()
    {
        return $this->belongsTo(UsahaPasanganAnggota::class);
    }
    function tempat_lahir()
    {
        return $this->belongsTo(Kota::class,'tempat_lahir_id','id');
    }
}
