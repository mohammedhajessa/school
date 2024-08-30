<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'Sections';
    public $timestamps = true;
    protected $fillable=['Name_Section','Grade_id','Class_id'];
    public function My_Classes()
    {
        return $this->belongsTo(Classroom::class, 'Class_id');
    }
    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_section');
    }
    public function students()
    {
        return $this->hasMany('App\Models\Student','section_id');
    }

}
