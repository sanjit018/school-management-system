<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = "students";
    protected $fillable = ['name',
    'email',
    'password',
    'unique_id',
    'contact',
    'fname',
    'mname',
    'dob',
    'gender',
    'admission_date',
    'roll_number',
    'class',
    'section',
    'profile'];

    protected $casts = ['id'];
}
