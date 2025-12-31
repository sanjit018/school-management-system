<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignClassSubject extends Model
{
    protected $table = "assign_class_subject";
    protected $fillable = ['unique_id','class_id','subject_id'];
    public function classes()
    {
        return $this->hasMany(Classs::class,"unique_id","class_id");
    }
    public function subjects()
    {
       return $this->hasMany(Subject::class,"unique_id","subject_id");
    }
}
