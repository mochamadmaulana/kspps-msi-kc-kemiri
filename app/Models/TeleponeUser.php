<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeleponeUser extends Model
{
    use HasFactory;
    protected $table = "telepone_users";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
