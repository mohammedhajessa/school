<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    // protected $table = 'Grades';
    public $translatable = ['Name'];

    protected $fillable=['Name','Nots'];
    protected $table = 'Grades';
    public $timestamps = true;
    public function Sections()
    {
        return $this->hasMany('App\Models\Section', 'Grade_id');
    }

}
