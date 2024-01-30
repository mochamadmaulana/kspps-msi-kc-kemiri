<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUsaha extends Model
{
    use HasFactory;
    protected $table = "jenis_usaha";
    protected $guarded = [];

    // public function scopeSearch(Builder $query, string $search = null) : void
    // {
    //     $query->where('kode','like','%'.$search.'%')
    //         ->orWhere('nama','like','%'.$search.'%');
    // }
    public function komoditi_usaha()
    {
        return $this->hasMany(KomoditiUsaha::class);
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
