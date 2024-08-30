<?php
namespace App\Repository;

use App\Models\Grade;
use App\Models\promotion;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnValueMap;

class StudentsPromotionRepository implements StudentsPromotionRepositoryInterface{
    public function index(){
        $Grades=Grade::all();
        return view('pages.Students.pormotion.index',compact('Grades'));
    }
    public function store($request){
        DB::beginTransaction();
        // try{
        $students=Student::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();
        // if($students->count()<1){
        //     return redirect()->back()->with('erorr_promotions',('لا يوجد طالب في هذه الصف'));
        // }
        foreach ($students as $student){

            $ids = explode(',',$student->id);
            student::whereIn('id', $ids)
                ->update([
                    'Grade_id'=>$request->Grade_id_new,
                    'Classroom_id'=>$request->Classroom_id_new,
                    'section_id'=>$request->section_id_new,
                ]);
                promotion::updateOrCreate([
                'student_id'=>$student->id,
                'from_Classroom'=>$request->Classroom_id,
                'to_Classroom'=>$request->Classroom_id_new,
                'from_section'=>$request->section_id,
                'to_section'=>$request->section_id_new,
                'from_grade'=>$request->Grade_id,
                'to_grade'=>$request->Grade_id_new,
                ]);
        }
        DB::commit();
        session()->flash('success', 'تم حفظ البيانات بنجاح!');
        return redirect()->back();
    // }catch(Exception $e){
    //     DB::rollBack();
    //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    // }
}
    public function  create(){
        $promotions=promotion::all();
        return view('pages.Students.pormotion.mangment',compact('promotions'));
    }
    public function  rolback($request){

        DB::beginTransaction();
        try{
            if($request->page_id==1){
            $Promotions=promotion::all();
        foreach($Promotions as $Promotion){
            $ids = explode(',',$Promotion->student_id);
            student::whereIn('id', $ids)
                ->update([
                    'Grade_id'=>$Promotion->from_grade,
                    'Classroom_id'=>$Promotion->from_Classroom,
                    'section_id'=>$Promotion->from_section,
                ]);
                promotion::truncate();
            }
            DB::commit();
            session()->flash('success', 'تم ارجاع البيانات بنجاح!');
            return redirect()->back();
        }else{
            $Promotion=promotion::findOrFail($request->id);
            $ids = explode(',',$Promotion->student_id);
            student::where('id', $Promotion->student_id)
                ->update([
                    'Grade_id'=>$Promotion->from_grade,
                    'Classroom_id'=>$Promotion->from_Classroom,
                    'section_id'=>$Promotion->from_section,
                ]);
                promotion::destroy($request->id);
                DB::commit();
                session()->flash('success', 'تم ارجاع البيانات بنجاح!');
                return redirect()->back();
        }
        }catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
