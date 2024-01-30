<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantor extends Model
{
    use HasFactory;
    protected $table = "kantor";
    protected $guarded = [];

    function scopeSearch(Builder $query, string $filters = null) : void
    {
        $query->when($filters ?? false, fn($query, $search) =>
            $query->where('kode','like','%'.$search.'%')
                ->orWhere('nama','like','%'.$search.'%')
                ->orWhereHas('kecamatan',fn($query) =>
                    $query->where('nama_kecamatan','like','%'.$search.'%')
                )
                ->orWhereHas('kelurahan',fn($query) =>
                    $query->where('nama_kelurahan','like','%'.$search.'%')
                )
        );
    }

    function galeri_kantor()
    {
        return $this->hasMany(GaleriKantor::class)->orderBy('id','DESC');
    }
    function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
    function kota()
    {
        return $this->belongsTo(Kota::class,'kota_kab_id','id');
    }
    function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
    function karyawan()
    {
        return $this->hasOne(User::class);
    }
    function anggota()
    {
        return $this->hasOne(Anggota::class);
    }
}
