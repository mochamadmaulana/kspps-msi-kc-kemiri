<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = "anggota";
    protected $guarded = [];

    function scopeSearch(Builder $query, string $filters = null) : void
    {
        $query->when($filters ?? false, fn($query, $search) =>
            $query->where('nomor_identitas','like','%'.$search.'%')
                ->orWhere('nama_lengkap','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%')
                ->orWhere('nomor_telepone','like','%'.$search.'%')
                ->orWhere('status_keanggotaan','like','%'.$search.'%')
                ->orWhere('status_registrasi','like','%'.$search.'%')
                ->orWhereHas('majlis',fn($query) =>
                    $query->where('nama','like','%'.$search.'%')
                )
                ->orWhereHas('tempat_lahir',fn($query) =>
                    $query->where('nama_kota','like','%'.$search.'%')
                )
        );
    }

    function majlis()
    {
        return $this->belongsTo(Majlis::class);
    }
    function tempat_lahir()
    {
        return $this->belongsTo(Kota::class,'tempat_lahir_id','id');
    }
    function alamat()
    {
        return $this->hasMany(AlamatAnggota::class);
    }
    function registrasi()
    {
        return $this->hasOne(RegistrasiAnggota::class);
    }
    function pasangan()
    {
        return $this->hasOne(PasanganAnggota::class);
    }
    function kantor()
    {
        return $this->belongsTo(Kantor::class);
    }
    function usaha()
    {
        return $this->hasOne(UsahaAnggota::class);
    }
    function usaha_pasangan()
    {
        return $this->hasOne(UsahaPasanganAnggota::class);
    }
    public function histori_registrasi()
    {
        return $this->hasMany(HistoriRegistrasiAnggota::class)->orderBy('id','DESC');
    }
    public function lampiran_registrasi()
    {
        return $this->hasMany(LampiranRegistrasiAnggota::class);
    }
    public function inputer()
    {
        return $this->belongsTo(User::class,'inputer_id','id');
    }
}
