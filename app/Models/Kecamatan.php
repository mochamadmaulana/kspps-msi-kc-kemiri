<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = "kecamatan";

    function kantor()
    {
        return $this->hasOne(Kantor::class);
    }
    function majlis()
    {
        return $this->hasOne(Majlis::class);
    }
    function alamat_anggota()
    {
        return $this->hasMany(AlamatAnggota::class);
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
