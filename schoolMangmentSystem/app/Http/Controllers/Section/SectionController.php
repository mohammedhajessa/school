<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeSections;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Teacher;

class SectionController extends Controller
{
    //
    public function index(){

    $Grades = Grade::with(['Sections'])->get();
    $teachers=Teacher::all();
    $list_Grades = Grade::all();

    return view('pages.Sections.Sections',compact('Grades','list_Grades','teachers'));
}
public function store(Request $request){
    // dd($request);
        try {
            $request->validate([

                'Grade_id' => 'required|exists:grades,id',
                'Class_id' => 'required|exists:classrooms,id',
            ]);
            $exists = Section::where('Name', $request->input('Name'))
            ->where('Grade_id', $request->input('Grade_id'))
            ->where('Class_id', $request->input('Class_id'))
            ->exists();

if ($exists) {
return redirect()->back()->withErrors(['error' => '.هذه الشعبة موجودة بالفعل']);
}

        $Sections = new Section();
        $Sections->Name = $request->Name;
        $Sections->Grade_id = $request->Grade_id;
        $Sections->Class_id = $request->Class_id;
        $Sections->save();
        $Sections->teachers()->attach($request->teacher_id);
        // toastr()->success(trans('.تم ادخال البيانات بنجاح '));
        return redirect()->route('section.index');
    }

    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }
    public function update(storeSections $request){
        try {
            $Sections = Section::findOrFail($request->id);
            $Sections->Name =$request->Name_Section;
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;
            if(isset($request->teacher_id)){
                $Sections->teachers()->sync($request->teacher_id);
            }else{
                $Sections->teachers()->sync(array());
            }
            $Sections->save();
            // toastr()->success(trans('messages.Update'));
            return redirect()->route('section.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
}
    public function getclasses($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");

        return $list_classes;
    }
    public function destroy(Request $request)
    {
        Section::findOrFail($request->id)->delete();
        // toastr()->error(trans('messages.Delete'));
        return redirect()->route('section.index');

    }

}

