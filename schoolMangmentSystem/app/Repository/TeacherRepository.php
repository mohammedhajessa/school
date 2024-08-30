<?php
namespace App\Repository;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;

use App\Repository\TeacherReposiitoryInterface;
use Flasher\Laravel\Facade\Flasher;

class TeacherRepository implements TeacherReposiitoryInterface{
    public function getAllTeachers(){
        return Teacher::all();
    }
    public function getGender(){
        return Gender::all();
    }
    public function getSpecialization(){
        return Specialization::all();
    }
    public function storeTachers($request){
        try{
            $Teachers=new Teacher();
            $Teachers->Email=$request->Email;
            $Teachers->Password=$request->Password;
            $Teachers->Name=$request->Name_ar;
            $Teachers->Specialization_id=$request->Specialization_id;
            $Teachers->Gender_id=$request->Gender_id;
            $Teachers->Joining_Date=$request->Joining_Date;
            $Teachers->Address=$request->Address;
            $Teachers->Phone=$request->Phone;
            $Teachers->save();
            // session()->flash('success', 'تم تخزين البيانات بنجاح!');
            return redirect()->route('Teacher.create');
        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
    public  function updateTacher($request){
        $Teachers= Teacher::findOrFail($request->id);
        $Teachers->Email=$request->Email;
        $Teachers->Password=$request->Password;
        $Teachers->Name=$request->Name_ar;
        $Teachers->Specialization_id=$request->Specialization_id;
        $Teachers->Gender_id=$request->Gender_id;
        $Teachers->Joining_Date=$request->Joining_Date;
        $Teachers->Address=$request->Address;
        $Teachers->Phone=$request->Phone;
        $Teachers->save();
        // session()->flash('success', 'تم تعديل البيانات بنجاح!');
        return redirect()->route('Teacher.index');
    }
    public function editTacher($id){
        return Teacher::find($id);
    }
    public function deleteTacher($request){
        $Teachers=Teacher::findOrFail($request->id);
        $Teachers->delete();
        // session()->flash('success', 'تم حذف البيانات بنجاح!');
        return redirect()->route('Teacher.index');
        }
}
