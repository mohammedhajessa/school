<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        // Add other fillable fields here
        'original_province_id',
        'current_province_id',
    ];

    public function originalProvince()
    {
        return $this->belongsTo(Province::class, 'original_province_id');
    }

    public function currentProvince()
    {
        return $this->belongsTo(Province::class, 'current_province_id');
    }
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }


    // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }

    // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }
    public function parent()
    {
        return $this->belongsTo('App\Models\My_Parent', 'parent_id');
    }
    public function attendance()
    {
        return $this->hasMany('App\Models\Attendance', 'student_id');
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subjects_students')
                    ->withPivot('grade')
                    ->withTimestamps();
    }
}
