<?php

namespace App\Http\Controllers\Classroom;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use Flasher\Laravel\Facade\Flasher;

// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    public function index()
    {
        $classes = Classroom::all();
        $grades = Grade::all();
        return view('pages.Classrooms.classrooms', compact('classes', 'grades'));
    }
    public function create() {}
    public function store(Request $request)
    {
        $classs = $request->input('List_Classes');
        // التحقق من أن الصفوف المدخلة غير موجودة مسبقًا في قاعدة البيانات
        try {
            foreach ($classs as $class) {
                $existingClass = DB::table('classrooms')
                    ->where('Name_Class', $class['Name'])
                    ->where('Grade_id', $class['Grade_id'])
                    ->first();

                if ($existingClass) {
                    return redirect()->back()->withErrors([
                        'List_Classes' => 'هذا الصف  "' . $class['Name'] . '"موجود بالفعل .'
                    ])->withInput();
                }
            }
            $lsit = $request->List_Classes;
            foreach ($lsit as $List_Class) {

                $classes = new Classroom();

                $classes->Name_Class = $List_Class['Name'];

                $classes->Grade_id = $List_Class['Grade_id'];

                $classes->save();
            }
            // Flasher::addSuccess('تم ادخال الصف  بنجاح!'
        // );

            return redirect()->route('classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request)
    {
        // التحقق من أن الصفوف المدخلة غير موجودة مسبقًا في ق
        try {
            $existingClass = DB::table('classrooms')
            ->where('Name_Class', $request->input('Name'))
            ->where('Grade_id', $request->input('Grade_id'))
            ->first();
            if ($existingClass) {
                return redirect()->back()->withErrors([
                    'error' => 'هذا الصف "' . $request->input('Name') . '" موجود بالفعل'
                ])->withInput();
        }
            $classs = Classroom::findOrFail($request->id);
            $classs->Name_Class=$request->Name;
            $classs->Grade_id=$request->Grade_id;
            $classs->save();
            // toastr()->success('تم تعديل البيانات بنجاح ');
            return redirect()->route('classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy(Request $request)
    {
        $classes = Classroom::find($request->input('id'));
        $classes->delete();
        // toastr()->success('تم حذف البيانات بنجاح ');
        return redirect()->route('classes.index');
    }
    public function refresh(){
        return redirect()->route('grades.index');
    }
}
