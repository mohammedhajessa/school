<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name','grade_id','classroom_id','teacher_id'];

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }

    function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'subjects_students')
                    ->withPivot('grade')
                    ->withTimestamps();
    }
}
