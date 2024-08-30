<?php

namespace App\Http\Controllers\Grade;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use Exception;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    //
    public function index(){
        $grades=Grade::all();
        return view('pages.Grades.grades',compact('grades'));
    }
    public function create(){
    }
    public function store(Request $request){
        $existingName = Grade::where('Name', $request->input('Name'))->first();
        if ($existingName) {
        return redirect()->back()->withErrors(['name' => 'هذا الاسم موجود مسبقًا.']);
        }
        try{
            $valdiate=$request->validate([
                'Name'=>'required',
                ]);
                $grade=new Grade();
                $grade->Name=$request->input('Name');
                // if($request)
                $grade->Nots = $request->Notes ?? 'لا يوجد ملاحظات';
                $grade->save();
                // toastr()->success('تم ادخال البيانات بنجاح ');
                return redirect()->route('grades.index');
        }catch(Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }
    public function show($id){
    }
    public function edit($id){
    }
    public function update(Request $request){
        try{
            $valdiate=$request->validate([
                'Name'=>'required',
                ]);
                $grade=Grade::find($request->input('id'));
                $grade->Name=$request->input('Name');
                $grade->Nots=$request->input('Notes');
                $grade->save();
                // toastr()->success('تم تعديل البيانات بنجاح ');
                return redirect()->route('grades.index');

        }catch(Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }
    public function destroy(Request $request){
        try{
            $grade=Grade::find($request->input('id'));
            $grade->delete();
            // toastr()->success('تم حذف البيانات بنجاح ');
            return redirect()->route('grades.index');
            }catch(Exception $e){
                return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
            }
    }
}
