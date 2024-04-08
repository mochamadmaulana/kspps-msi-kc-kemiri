<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Majlis extends Model
{
    use HasFactory;
    protected $table = "majlis";
    protected $guarded = [];

    public function scopeSearch(Builder $query, string $search = null) : void
    {
        $query->where('kode','like','%'.$search.'%')
            ->orWhere('nama','like','%'.$search.'%')
            ->orWhere('kategori','like','%'.$search.'%')
            ->orWhereHas('kecamatan',fn($query) =>
                $query->where('nama_kecamatan','like','%'.$search.'%')
            )
            ->orWhereHas('kelurahan',fn($query) =>
                $query->where('nama_kelurahan','like','%'.$search.'%')
            )
            ->orWhereHas('petugas',fn($query) =>
                $query->where('nama_lengkap','like','%'.$search.'%')
            );
            // ->orWhereHas('ketua',fn($query) =>
            //     $query->where('nama_lengkap','like','%'.$search.'%')
            // );
    }

    function petugas()
    {
        return $this->belongsTo(User::class);
    }
    function ketua()
    {
        return $this->belongsTo(Anggota::class,'ketua_id','id');
    }
    function anggota()
    {
        return $this->hasMany(Anggota::class);
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
