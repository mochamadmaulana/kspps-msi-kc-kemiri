<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    function scopeSearch(Builder $query, string $filters = null) : void
    {
        $query->when($filters ?? false, fn($query, $search) =>
            $query->where('nama_lengkap','like','%'.$search.'%')
                ->orWhere('nomor_induk_karyawan','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%')
                ->orWhere('role','like','%'.$search.'%')
                ->orWhereHas('tempat_lahir',fn($query) =>
                    $query->where('nama_kota','like','%'.$search.'%')
                )
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomor_induk_karyawan',
        'kantor_id',
        'nama_lengkap',
        'email',
        'tempat_lahir_id',
        'tanggal_lahir',
        'aktif',
        'role',
        'foto_profile',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function telepone_user()
    {
        return $this->hasMany(TeleponeUser::class);
    }
    public function majlis()
    {
        return $this->hasMany(Majlis::class);
    }
    public function tempat_lahir()
    {
        return $this->belongsTo(Kota::class,'tempat_lahir_id','id');
    }
    public function kantor()
    {
        return $this->belongsTo(Kantor::class);
    }
    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
    public function registrasi_anggota()
    {
        return $this->hasHas(RegistrasiAnggota::class);
    }
    public function histori_registrasi_anggota()
    {
        return $this->hasMany(HistoriRegistrasiAnggota::class);
    }
}
