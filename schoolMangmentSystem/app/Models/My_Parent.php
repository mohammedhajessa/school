<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class My_Parent extends Authenticatable
{
    //
    protected $fillable = [
        'Name_Father',
        'Name_Grand',
        'National_ID_Father',
        'Phone_Father',
        'Job_Father',
        'Nationality_Father',
        'Blood_Type_Father',
        'Name_Mother',
        'National_ID_Mother',
        'Phone_Mother',
        'Passport_ID_Mother',
        'Nationality_Mother',
        'Blood_Type_Mother',
        'Email',
        'Password'
        // Add any other fields here that you want to allow mass assignment
    ];
}
