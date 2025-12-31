<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    protected $table = "classs";

    protected $fillable = ["name","unique_id","status"];

    protected $casts = ["id"];

    public function assignClass()
    {
       return $this->belongsTo(AssignClassSubject::class,"class_id","unique_id");
    }
}
