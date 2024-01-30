<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembiayaan extends Model
{
    use HasFactory;
    protected $table = "pembiayaan";
    protected $guarded = [];

    function scopeSearch(Builder $query, string $filters = null) : void
    {
        $query->when($filters ?? false, fn($query, $search) =>
            $query->where('nomor_identitas','like','%'.$search.'%')
                ->orWhere('nama_lengkap','like','%'.$search.'%')
                // ->orWhereHas('majlis',fn($query) =>
                //     $query->where('nama','like','%'.$search.'%')
                // )
        );
    }
}
