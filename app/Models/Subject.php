<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subject";
    protected $fillable = ['unique_id','name','class_id'];
    public function assignSubject()
    {
        return $this->belongsTo(AssignClassSubject::class, "subject_id", "unique_id");
    }
}
