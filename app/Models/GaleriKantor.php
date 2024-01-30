<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriKantor extends Model
{
    use HasFactory;
    protected $table = "galeri_kantor";
    protected $guarded = [];

    function kantor()
    {
        return $this->belongsTo(Kantor::class);
    }
}
