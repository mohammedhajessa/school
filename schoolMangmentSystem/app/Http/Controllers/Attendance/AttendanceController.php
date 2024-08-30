<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Student;
use App\Repository\AttendanceRepository;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $Attendance;
    public function __construct(AttendanceRepository $Attendance){
        $this->Attendance = $Attendance;
    }
    public function index()
    {
        return $this->Attendance->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Attendance->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->Attendance->show($id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($studentId)
    {
        $attendances = Attendance::where('student_id', $studentId)->get();
        $student = Student::find($studentId);
        $totalDays = $attendances->count();
        $presentDays = $attendances->where('attendence_status', 1)->count();
        $absentDays = $attendances->where('attendence_status', 0)->count();
        $presentPercentage = $totalDays > 0 ? ($presentDays / $totalDays) * 100 : 0;
        $absentPercentage = $totalDays > 0 ? ($absentDays / $totalDays) * 100 : 0;

        return view('pages.Attendance.attendance_day', compact('attendances', 'presentDays', 'absentDays', 'presentPercentage', 'absentPercentage','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($student_id)
    {
        $student=Attendance::find($student_id);
        $student->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح!');
        return view('pages.Students.index');
    }
    // public function show_attendance($studentId)
    // {
    //     $attendances = Attendance::where('student_id', $studentId)->get();

    //     $totalDays = $attendances->count();
    //     $presentDays = $attendances->where('attendence_status', 1)->count();
    //     $absentDays = $attendances->where('attendence_status', 0)->count();
    //     $presentPercentage = $totalDays > 0 ? ($presentDays / $totalDays) * 100 : 0;
    //     $absentPercentage = $totalDays > 0 ? ($absentDays / $totalDays) * 100 : 0;

    //     return view('attendance.show', compact('attendances', 'presentDays', 'absentDays', 'presentPercentage', 'absentPercentage'));
    // }

}
