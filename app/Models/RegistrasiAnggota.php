<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiAnggota extends Model
{
    use HasFactory;
    protected $table = "registrasi_anggota";
    protected $guarded = [];

    function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
    function inputer()
    {
        return $this->belongsTo(User::class,'inputer_id','id');
    }
}
