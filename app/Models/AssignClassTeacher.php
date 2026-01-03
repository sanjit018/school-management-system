<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignClassTeacher extends Model
{
    protected $table = "assign_class_teacher";

    protected $fillable = ["unique_id","class_id","subject_id","teacher_id","status"];

    public function classes()
    {
        return $this->hasMany(Classs::class,"unique_id","class_id");
    }
    public function subject()
    {
        return $this->hasMany(Subject::class,"unique_id","subject_id");
    }
    public function teacher()
    {
        return $this->hasMany(Teachers::class,"unique_id","teacher_id");
    }
}
