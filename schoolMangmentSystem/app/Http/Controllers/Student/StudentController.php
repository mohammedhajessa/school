<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Province;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_Blood;
use App\Repository\StudentsRepositoryInterface;
use Illuminate\Http\Request;
use App\Repository\TeacherReposiitoryInterface;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  protected $Students;
    // public function __construct(StudentsRepositoryInterface $Students){
    //     $this->Students = $Students;
    // }
    public function index()
    {
        $students=Student::all();
        return view('pages.Students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['my_classes']=Grade::all();
        $data['Genders']=Gender::all();
        $data['nationals']=Nationalitie::all();
        $data['parents']=My_Parent::all();
        $data['bloods']=Type_Blood::all();
        $data['citys']=Province::all();
        $data['students']=Student::all();
        return view('pages.Students.add',$data);
    //    return $this->Students->CreateStudent();
        // return view('pages.Students.add',compact('Students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentsRequest $request)
    {
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
        // session()->flash('success', 'تم حفظ البيانات بنجاح!');
        return redirect()->route('Students.create');
        // }catch(Exception $e){
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
        // return $this->Students->Store_Student($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['Grades']=Grade::all();
        $data['Genders']=Gender::all();
        $data['nationals']=Nationalitie::all();
        $data['parents']=My_Parent::all();
        $data['bloods']=Type_Blood::all();
        $data['citys']=Province::all();
        $Students=Student::findOrFail($id);

        return  view('pages.Students.edit',compact('Students'),$data);
        // return $this->Students->Edit_Student($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudentsRequest $request)
    {
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
            // session()->flash('success', 'تم تعديل البيانات بنجاح!');
            return redirect()->route('Students.index');
            }catch(Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        // return $this->Students->Update_Student($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $student=Student::findOrFail($request->id);
        $student->delete();
        // session()->flash('success', 'تم حذف البيانات بنجاح!');
        return redirect()->route('Students.index');
        // return $this->Students->Delete_Student($request);
    }
    public function Get_classrooms($id){
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;
        // return $this->Students->Get_classrooms($id);
    }
    public function Get_Sections($id){
        $list_sections = Section::where("Class_id", $id)->pluck("Name", "id");
        return $list_sections;
        // return $this->Students->Get_Sections($id);
    }
    public function Get_phone($id){
        $list_classes = My_Parent::where("parent_id", $id)->pluck("Phone_Father", "id");
        return $list_classes;
        // return $this->Students->Get_phone($id);
    }
    public function showMedicalReport($id)
    {
        $student = Student::findOrFail($id);
        $filePath = $student->medical_report_path;

        if (!$filePath || !Storage::exists($filePath)) {
            abort(404, 'التقرير الطبي غير موجود');
        }

        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

        return view('pages.Students.medical-report', compact('filePath', 'fileExtension'));
    }
}
