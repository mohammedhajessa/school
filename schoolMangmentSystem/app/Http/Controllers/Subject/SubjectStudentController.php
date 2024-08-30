<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\StudentSubject;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student)
    {
        // $grades = $student->grades;
        return view('pages.Attendance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($studentId)
    {
        $student=Student::findOrFail($studentId);
        $subjects = Subject::where('grade_id', $student->Grade_id)
        ->where('Classroom_id', $student->Classroom_id)->get();
        return view('pages.Attendance.add', compact('student','subjects'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // $request->validate([
        //     'student_id' => 'required|exists:students,id',
        //     'subject_id' => 'required|exists:subjects,id',
        //     'first_term_coursework' => 'nullable|numeric|min:0|max:100',
        //     'first_term_exam' => 'nullable|numeric|min:0|max:100',
        //     'second_term_coursework' => 'nullable|numeric|min:0|max:100',
        //     'second_term_exam' => 'nullable|numeric|min:0|max:100',
        // ]);
        $studentSubject = StudentSubject::updateOrCreate(
            [
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
            ],
            []
        );

        // تحقق من كل قيمة قبل تخزينها للتأكد من أنها ليست فارغة أو غير موجودة
        if ($request->filled('oral_grade_first_semester_1')) {
            $studentSubject->oral_grade_first_semester_1 = $request->oral_grade_first_semester_1;
        }
        if ($request->filled('oral_grade_first_semester_2')) {
            $studentSubject->oral_grade_first_semester_2 = $request->oral_grade_first_semester_2;
        }
        if ($request->filled('oral_grade_first_semester_3')) {
            $studentSubject->oral_grade_first_semester_3 = $request->oral_grade_first_semester_3;
        }
        if ($request->filled('homework_grade_first_semester_1')) {
            $studentSubject->homework_grade_first_semester_1 = $request->homework_grade_first_semester_1;
        }
        if ($request->filled('homework_grade_first_semester_2')) {
            $studentSubject->homework_grade_first_semester_2 = $request->homework_grade_first_semester_2;
        }
        if ($request->filled('homework_grade_first_semester_3')) {
            $studentSubject->homework_grade_first_semester_3 = $request->homework_grade_first_semester_3;
        }
        if ($request->filled('quiz_grade_first_semester_1')) {
            $studentSubject->quiz_grade_first_semester_1 = $request->quiz_grade_first_semester_1;
        }
        if ($request->filled('quiz_grade_first_semester_2')) {
            $studentSubject->quiz_grade_first_semester_2 = $request->quiz_grade_first_semester_2;
        }
        if ($request->filled('quiz_grade_first_semester_3')) {
            $studentSubject->quiz_grade_first_semester_3 = $request->quiz_grade_first_semester_3;
        }

        $studentSubject->total_work_first_1 =
        ($studentSubject->oral_grade_first_semester_1 ?? 0) +
        ($studentSubject->homework_grade_first_semester_1 ?? 0) +
        ($studentSubject->quiz_grade_first_semester_1 ?? 0);

        $studentSubject->total_work_first_2 =
        ($studentSubject->oral_grade_first_semester_2 ?? 0) +
        ($studentSubject->homework_grade_first_semester_2 ?? 0) +
        ($studentSubject->quiz_grade_first_semester_2 ?? 0);

        $studentSubject->total_work_first_3 =
        ($studentSubject->oral_grade_first_semester_3 ?? 0) +
        ($studentSubject->homework_grade_first_semester_3 ?? 0) +
        ($studentSubject->quiz_grade_first_semester_3 ?? 0);

        $total_1 = $studentSubject->total_work_first_1;
        $total_2 = $studentSubject->total_work_first_2;
        $total_3 = $studentSubject->total_work_first_3;

        $average_1 = $total_1 / 3;
        $average_2 = $total_2 / 3;
        $average_3 = $total_3 / 3;

        $studentSubject->average_first_semester_1 = $average_1;
        $studentSubject->average_first_semester_2 = $average_2;
        $studentSubject->average_first_semester_3 = $average_3;

        $studentSubject->total_average_first_semester_1 =  $studentSubject->average_first_semester_1
        + $studentSubject->average_first_semester_2
        + $studentSubject->average_first_semester_3 ;
        $studentSubject->degree_first_semester = $studentSubject->total_average_first_semester_1 /2;

        if ($request->filled('oral_grade_second_semester_1')) {
            $studentSubject->oral_grade_second_semester_1 = $request->oral_grade_second_semester_1;
        }
        if ($request->filled('oral_grade_second_semester_2')) {
            $studentSubject->oral_grade_second_semester_2 = $request->oral_grade_second_semester_2;
        }
        if ($request->filled('oral_grade_second_semester_3')) {
            $studentSubject->oral_grade_second_semester_3 = $request->oral_grade_second_semester_3;
        }
        if ($request->filled('homework_grade_second_semester_1')) {
            $studentSubject->homework_grade_second_semester_1 = $request->homework_grade_second_semester_1;
        }
        if ($request->filled('homework_grade_second_semester_2')) {
            $studentSubject->homework_grade_second_semester_2 = $request->homework_grade_second_semester_2;
        }
        if ($request->filled('homework_grade_second_semester_3')) {
            $studentSubject->homework_grade_second_semester_3 = $request->homework_grade_second_semester_3;
        }
        if ($request->filled('quiz_grade_second_semester_1')) {
            $studentSubject->quiz_grade_second_semester_1 = $request->quiz_grade_second_semester_1;
        }
        if ($request->filled('quiz_grade_second_semester_2')) {
            $studentSubject->quiz_grade_second_semester_2 = $request->quiz_grade_second_semester_2;
        }
        if ($request->filled('quiz_grade_second_semester_3')) {
            $studentSubject->quiz_grade_second_semester_3 = $request->quiz_grade_second_semester_3;
        }

        $studentSubject->total_work_second_1 =
        ($studentSubject->oral_grade_second_semester_1 ?? 0) +
        ($studentSubject->homework_grade_second_semester_1 ?? 0) +
        ($studentSubject->quiz_grade_second_semester_1 ?? 0);

        $studentSubject->total_work_second_2 =
        ($studentSubject->oral_grade_second_semester_2 ?? 0) +
        ($studentSubject->homework_grade_second_semester_2 ?? 0) +
        ($studentSubject->quiz_grade_second_semester_2 ?? 0);

        $studentSubject->total_work_second_3 =
        ($studentSubject->oral_grade_second_semester_3 ?? 0) +
        ($studentSubject->homework_grade_second_semester_3 ?? 0) +
        ($studentSubject->quiz_grade_second_semester_3 ?? 0);

        $total_1 = $studentSubject->total_work_second_1;
        $total_2 = $studentSubject->total_work_second_2;
        $total_3 = $studentSubject->total_work_second_3;

        $average_1 = $total_1 / 3;
        $average_2 = $total_2 / 3;
        $average_3 = $total_3 / 3;

        $studentSubject->average_second_semester_1 = $average_1;
        $studentSubject->average_second_semester_2 = $average_2;
        $studentSubject->average_second_semester_3 = $average_3;

        $studentSubject->total_average_second_semester_1 =  $studentSubject->average_second_semester_1
        + $studentSubject->average_second_semester_2
        + $studentSubject->average_second_semester_3 ;
        $studentSubject->degree_second_semester = $studentSubject->total_average_second_semester_1 /2;

        // حفظ التغييرات
        $studentSubject->save();
            return redirect()->back()->with('success', 'تم حفظ العلامات بنجاح');

        }
        // [
        //     'first_term_coursework' => $request->first_term_coursework,
        //     'first_term_exam' => $request->first_term_exam,
        //     'second_term_coursework' => $request->second_term_coursework,
        //     'second_term_exam' => $request->second_term_exam,
        //     'first_term_total' => ($request->first_term_coursework ?? 0) + ($request->first_term_exam ?? 0),
        //     'second_term_total' => ($request->second_term_coursework ?? 0) + ($request->second_term_exam ?? 0),
        //     'yearly_average' => (
        //         (($request->first_term_coursework ?? 0) + ($request->first_term_exam ?? 0)) +
        //         (($request->second_term_coursework ?? 0) + ($request->second_term_exam ?? 0))
        //     ) / 2,
        //     ]
        public function show($studentId)
        {
            $student = Student::findOrFail($studentId);
        $grades = StudentSubject::where('student_id', $studentId)
            ->with('subject')
            ->get();

            $firstTermOverallTotal = 0;
            $secondTermOverallTotal = 0;

        foreach ($grades as $grade) {
            $grade->first_term_total = ($grade->first_term_coursework ?? 0) + ($grade->first_term_exam ?? 0);
            $firstTermOverallTotal += $grade->first_term_total;
            $grade->second_term_total = ($grade->second_term_coursework ?? 0) + ($grade->second_term_exam ?? 0);
            $secondTermOverallTotal += $grade->second_term_total;
            $grade->yearly_average = ($grade->first_term_total + $grade->second_term_total) / 2;
        }
        $finalScore = ($firstTermOverallTotal + $secondTermOverallTotal) / 2;
        return view('pages.Attendance.show', compact(
            'grades',
            'student',
            'firstTermOverallTotal',
            'secondTermOverallTotal',
            'finalScore'
        ));
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $grade =StudentSubject::findOrFail($id);
        $subjects = Subject::where('grade_id', $grade->student->grade_id)->get();
        return view('pages.Attendance.edit_grade', compact('grade', 'subjects'));
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
    public function destroy($id)
    {
        //
    }
}
