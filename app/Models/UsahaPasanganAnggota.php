<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsahaPasanganAnggota extends Model
{
    use HasFactory;
    protected $table = "usaha_pasangan_anggota";
    protected $guarded = [];

    function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
    function pasangan_anggota()
    {
        return $this->hasMany(UsahaPasanganAnggota::class);
    }
    function jenis_usaha()
    {
        return $this->belongsTo(JenisUsaha::class);
    }
    function komoditi_usaha()
    {
        return $this->belongsTo(KomoditiUsaha::class);
    }
    function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
    function kota()
    {
        return $this->belongsTo(Kota::class);
    }
    function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
