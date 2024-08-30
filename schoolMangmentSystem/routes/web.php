<?php
namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Attendance\AttendanceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Grade\GradeController;
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Dashboard\DachboardController;
use App\Http\Controllers\Section\SectionController;
use App\Http\Controllers\Student\PromotionController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\Subject\SubjectStudentController;
use App\Models\Attendance;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('pages.dashboard');
// });

// Route::get('/', function () {
//     return view('pages.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::get('/', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
    // Route::get('/', [DachboardController::class,'index'])->name('selection');
    // Route::get('/login/{type}', [AuthenticatedSessionController::class,'loginForm'])->name('login.show');
    // Route::post('/login', [AuthenticatedSessionController::class, 'login'])->name('login');
    // Route::get('/dashboard', [DachboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');
    // Route::middleware('auth')->group(function () {
        // });


        // عرض نموذج تسجيل الدخول بناءً على النوع

        // Route::middleware('auth')->group(function () {
    // Route::get('/', [AuthenticatedSessionController::class, 'showSelectionForm'])->name('selection');
    // Route::get('/login/{type}', [AuthenticatedSessionController::class, 'showLoginForm'])->middleware('guest')->name('login.show');
    // Route::post('/login', [AuthenticatedSessionController::class, 'login'])->name('login');
    Route::get('/', function () {
        return view('auth.selection');
    })->name('selection');

    Route::get('/login/{type}', [AuthenticatedSessionController::class, 'loginForm'])->name('login.show');
    Route::post('/login', [AuthenticatedSessionController::class, 'login'])->name('login');
    Route::middleware(['auth:web'])->group(function () {
        Route::get('/dashboard', [DachboardController::class, 'admin'])->name('dashboard.admin');
    });
    Route::middleware(['auth:student'])->group(function () {
        Route::get('/student_dashboard', [DachboardController::class, 'student'])->name('dashboard.student');
    });
    Route::middleware(['auth:teacher'])->group(function () {
        Route::get('/teacher_dashboard', [DachboardController::class, 'teacher'])->name('dashboard.teacher');
    });
    Route::middleware(['auth:my__parent'])->group(function () {
        Route::get('/parent_dashboard', [DachboardController::class, 'parent'])->name('dashboard.parent');
    });
    // });
// Route::group(['namespace' => 'Auth'], function () {
// });
// مسارات للوحة التحكم للمستخدمين المختلفين مع التحقق من تسجيل الدخول
        // Route::get('/parent_dashboard', [DachboardController::class, 'parent']);
        // Route::middleware(['auth:web'])->get('/dashboard', [DachboardController::class, 'admin']);
        // Route::middleware(['auth:student'])->get('/student_dashboard', [DachboardController::class, 'student'])->name('student.dashboard');

        // Route::middleware(['auth:teacher'])->get('/teacher_dashboard', [DachboardController::class, 'teacher'])->name('teacher.dashboard');

        // Route::middleware(['auth:parent'])->get('/parent_dashboard', [DachboardController::class, 'parent'])->name('parent.dashboard');


        Route::post('students/grades/store', [SubjectStudentController::class, 'store'])->name('subjectGrade.store');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/grades',[GradeController::class, 'index'])->name('grades.index');
        Route::post('/grades',[GradeController::class, 'store'])->name('grades.store');
        Route::patch('/grades',[GradeController::class, 'update'])->name('grades.update');
        Route::delete('/grades',[GradeController::class, 'destroy'])->name('grades.delete');
        Route::get('/classes',[ClassroomController::class, 'index'])->name('classes.index');
        Route::post('/classes',[ClassroomController::class, 'store'])->name('classess.store');
        Route::patch('/classes',[ClassroomController::class, 'update'])->name('classess.update');
        Route::delete('/classes',[ClassroomController::class, 'destroy'])->name('classess.delete');
        Route::get('/sections',[SectionController::class, 'index'])->name('section.index');
        Route::get('/sections/{id}',[SectionController::class, 'show'])->name('index.show');
        Route::post('/sections',[SectionController::class, 'store'])->name('section.store');
        Route::patch('/sections',[SectionController::class, 'update'])->name('section.update');
        Route::delete('/sections',[SectionController::class, 'destroy'])->name('section.delete');
        Route::get('/classes/{grade_id}', [SectionController::class, 'getclasses']);
        Route::view('add_parent','livewire.show_Form');
        Route::get('/teachers/index',[TeacherController::class,'index'])->name('Teacher.index');
        Route::get('/teachers',[TeacherController::class,'create'])->name('Teacher.create');
        Route::post('/teachers',[TeacherController::class,'store'])->name('Teacher.store');
        Route::get('/teachers/{id}',[TeacherController::class,'edit'])->name('Teacher.edit');
        Route::delete('/teachers',[TeacherController::class,'destroy'])->name('Teacher.delete');
        Route::patch('/teachers',[TeacherController::class,'update'])->name('Teacher.update');
        Route::resource('Students', StudentController::class);
Route::get('/Get_classrooms/{Grade_id}',[StudentController::class,'Get_classrooms']);
Route::get('/Get_Sections/{Grade_id}',[StudentController::class,'Get_Sections']);
Route::get('/Get_phone/{phone_id}',[StudentController::class,'Get_phone']);
Route::get('/guardians/{id}/phone', [StudentController::class, 'getphone']);
Route::resource('Promotion', PromotionController::class);
Route::resource('Attendance', AttendanceController::class);
Route::resource('subjects', SubjectController::class);
// في routes/web.php

// // مسار لإضافة الدرجات
Route::get('students/{student}/grades/add', [SubjectStudentController::class, 'create'])->name('subjectGrade.create');
Route::get('/students/{studentId}/show', [SubjectStudentController::class, 'show'])->name('subjectGrade.show');
Route::get('/students/{studentId}/edit', [SubjectStudentController::class, 'edit'])->name('subjectGrade.edit');
Route::get('/students/{id}/medical-report', [StudentController::class, 'showMedicalReport']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
->middleware('auth')
->name('logout');

require __DIR__.'/auth.php';




// // مسار لحفظ الدرجات
// Route::post('students/{student}/grades', [SubjectStudentController::class, 'store'])->name('studentsGrade.store');

// // مسار لعرض الدرجات
// Route::get('students/{student}/grades', [SubjectStudentController::class, 'index'])->name('grades.index');

// Route::get('/students/export/{section_id}/{class}', [AttendanceController::class, 'exportExcel'])->name('students.export');
require __DIR__.'/auth.php';
