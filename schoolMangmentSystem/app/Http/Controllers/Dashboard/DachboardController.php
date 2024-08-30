<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DachboardController extends Controller
{
    // public function index(){
    //     return view('auth.selection');
    // }
    public function admin(){
        return view('pages.dashboard');
    }
    public function teacher(){
        return view('pages.teacher_dashboard');
    }
    public function parent(){
        return view('pages.parent_dashboard');
    }
    public function student(){
        return view('pages.student_dashboard');
    }
}
