<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAcademicHistory extends Model
{
    protected $table = "student_academic_history";

    protected $fillable = ["unique_id","student_id","class_id","academic_year","roll_number","section"];

    public function students()
    {
        return $this->hasMany(Students::class,"unique_id","student_id");
    }
}
