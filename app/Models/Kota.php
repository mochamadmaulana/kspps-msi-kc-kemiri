<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $table = "kota";
    protected $guarded = [];

    function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
    function kantor()
    {
        return $this->hasOne(Kantor::class);
    }
    function user()
    {
        return $this->hasOne(User::class);
    }
    function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
    function alamat_anggota()
    {
        return $this->hasMany(AlamatAnggota::class);
    }
    function pasangan_anggota()
    {
        return $this->hasMany(PasanganAnggota::class);
    }
    function usaha_anggota()
    {
        return $this->hasMany(UsahaAnggota::class);
    }
    function usaha_pasangan_anggota()
    {
        return $this->hasMany(UsahaPasanganAnggota::class);
    }
}
