<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $table = "teachers";
    protected $fillable = [
        'unique_id',
        'name',
        'email',
        'contact',
        'qualification',
        'profile',
    ];
    protected $casts = ['id'];
}
