<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = "provinsi";
    protected $guarded = [];

    function kota()
    {
        return $this->hasMany(Kota::class);
    }
    function kantor()
    {
        return $this->hasMany(Kantor::class);
    }
    function alamat_naggota()
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
