<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatAnggota extends Model
{
    use HasFactory;
    protected $table = "alamat_anggota";
    protected $guarded = [];

    function anggota()
    {
        return $this->belongsTo(Anggota::class);
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
