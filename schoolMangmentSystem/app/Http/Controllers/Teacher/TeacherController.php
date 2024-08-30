<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use App\Models\Gender;
use App\Models\Specialization;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Repository\TeacherReposiitoryInterface;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // protected $tachers;
    // public function __construct(TeacherReposiitoryInterface $teacher){
    //     $this->tachers = $teacher;
    // }
    public function index(){
        $Teachers=Teacher::all();
        return view('pages.Teachers.teachers',compact('Teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $specializations=Specialization::all();
        $genders=Gender::all();
        return view('pages.Teachers.craete',compact('specializations','genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeachers $request)
    {
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
        $Teachers=Teacher::find($id);
        $specializations=Specialization::all();
        $genders=Gender::all();
        return view('pages.Teachers.edit_table',compact('specializations','genders','Teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
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
        // return $this->tachers->updateTacher($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Teachers=Teacher::findOrFail($request->id);
        $Teachers->delete();
        // session()->flash('success', 'تم حذف البيانات بنجاح!');
        return redirect()->route('Teacher.index');
    }
}
