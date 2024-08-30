<?php
namespace App\Repository;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Province;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_Blood;
use Exception;
use Illuminate\Support\Facades\Hash;

class  StudentsRepository implements StudentsRepositoryInterface{
    public function CreateStudent(){
        $data['my_classes']=Grade::all();
        $data['Genders']=Gender::all();
        $data['nationals']=Nationalitie::all();
        $data['parents']=My_Parent::all();
        $data['bloods']=Type_Blood::all();
        $data['citys']=Province::all();
        $data['students']=Student::all();
        return view('pages.Students.add',$data);
    }
    public function Get_classrooms($id){
        // $data['classes']=Grade::where('id',$id)->get();
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;
    }
    public function Get_Sections($id){
        // $data['classes']=Grade::where('id',$id)->get();
        $list_sections = Section::where("Class_id", $id)->pluck("Name", "id");
        return $list_sections;
    }
    public function Store_Student($request){
        // try{
        // dd($request);
        $student = new Student();
        $student->name=$request->input('name');
        $student->email=$request->input('email');
        $student->password=Hash::make($request->input('password'));
        $student->student_code=$request->input('student_code');
        $student->place_birth=$request->input('place_birth');
        $student->Trust=$request->input('Trust');
        $student->record=$request->input('record');
        $student->record_number=$request->input('record_number');
        $student->record_place=$request->input('record_place');
        $student->Date_Birth=$request->input('Date_Birth');
        $student->gender_id=$request->input('gender_id');
        $student->nationalitie_id=$request->input('nationalitie_id');
        $student->blood_id=$request->input('blood_id');
        $student->Grade_id=$request->input('Grade_id');
        $student->parent_id=$request->input('parent_id');
        $student->gender_id=$request->input('gender_id');
        $student->academic_year=$request->input('academic_year');
        $student->current_province_id=$request->input('current_province_id');
        $student->original_province_id=$request->input('original_province_id');
        $student->Classroom_id=$request->input('Classroom_id');
        $student->section_id=$request->input('section_id');
        $student->date_of_leaving_previous_class=$request->input('date_of_leaving_previous_class');
        $student->transfer_document_date=$request->input('transfer_document_date');
        $student->transfer_document_number=$request->input('transfer_document_number');
        $student->failed_classes_prev_School=$request->input('failed_classes_prev_School');
        $student->enrollment_date=$request->input('enrollment_date');
        $student->disability_type=$request->input('disability_type');
        $student->failed_classes=$request->input('failed_classes');
        $student->nationalNumber=$request->input('nationalNumber');
        $student->subjects_excellent_in=$request->input('subjects_excellent_in');
        $student->subjects_weak_in=$request->input('subjects_weak_in');
        $student->reason_for_leaving_school=$request->input('reason_for_leaving_school');
        $student->is_orphan=$request->input('is_orphan');
        $student->is_disabled=$request->input('is_disabled');
        $student->residence_status=$request->input('residence_status');
        if ($request->hasFile('medical_report')) {
            $file = $request->file('medical_report');
            $filePath = $file->store('medical_reports', 'public'); // تخزين في `storage/app/public/medical_reports`
            $student->medical_report_path = $filePath;
        }
        $student->save();
        session()->flash('success', 'تم حفظ البيانات بنجاح!');
        return redirect()->route('Students.create');
        // }catch(Exception $e){
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
    }
    public function Get_Students(){
        $students=Student::all();
        return view('pages.Students.index',compact('students'));
    }
    public function Get_info(){
        $students=Student::all();
        return view('pages.Students.student_info',compact('students'));
    }
    public function Edit_Student($id){
        $data['Grades']=Grade::all();
        $data['Genders']=Gender::all();
        $data['nationals']=Nationalitie::all();
        $data['parents']=My_Parent::all();
        $data['bloods']=Type_Blood::all();
        $data['citys']=Province::all();
        $Students=Student::findOrFail($id);

        return  view('pages.Students.edit',compact('Students'),$data);
    }
    public function Update_Student($request){
        try{
        $student=Student::findOrFail($request->id);
        $student->name=$request->input('name');
        $student->email=$request->input('email');
        $student->password=Hash::make($request->input('password'));
        $student->student_code=$request->input('student_code');
        $student->place_birth=$request->input('place_birth');
        $student->Trust=$request->input('Trust');
        $student->record=$request->input('record');
        $student->record_number=$request->input('record_number');
        $student->record_place=$request->input('record_place');
        $student->Date_Birth=$request->input('Date_Birth');
        $student->gender_id=$request->input('gender_id');
        $student->nationalitie_id=$request->input('nationalitie_id');
        $student->blood_id=$request->input('blood_id');
        $student->Grade_id=$request->input('Grade_id');
        $student->parent_id=$request->input('parent_id');
        $student->academic_year=$request->input('academic_year');
        $student->current_province_id=$request->input('current_province_id');
        $student->original_province_id=$request->input('original_province_id');
        $student->Classroom_id=$request->input('Classroom_id');
        $student->section_id=$request->input('section_id');
        $student->previous_class=$request->input('previous_class');
        $student->date_of_leaving_previous_class=$request->input('date_of_leaving_previous_class');
        $student->transfer_document_date=$request->input('transfer_document_date');
        $student->enrollment_date=$request->input('enrollment_date');
        $student->disability_type=$request->input('disability_type');
        $student->failed_classes=$request->input('failed_classes');
        $student->nationalNumber=$request->input('nationalNumber');
        $student->subjects_excellent_in=$request->input('subjects_excellent_in');
        $student->subjects_weak_in=$request->input('subjects_weak_in');
        $student->reason_for_leaving_school=$request->input('reason_for_leaving_school');
        $student->is_orphan=$request->input('is_orphan');
        $student->is_disabled=$request->input('is_disabled');
        $student->residence_status=$request->input('residence_status');
        if($request->hasFile('medical_report')){
            $file=$request->file('medical_report');
            $filePath = $file->store('medical_reports'); // تخزين الملف في مجلد 'medical_reports'
            $student->medical_report = $filePath;
        }
        $student->save();
        session()->flash('success', 'تم تعديل البيانات بنجاح!');
        return redirect()->route('Students.index');
        }catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function Delete_Student($request){
        $student=Student::findOrFail($request->id);
        $student->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح!');
        return redirect()->route('Students.index');
        }
        public function Get_phone($id){
            $list_classes = My_Parent::where("parent_id", $id)->pluck("Phone_Father", "id");
            return $list_classes;
        }



}
