@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('Sections_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Sections_trans.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@php
    $style = 'font-size:20px;font-family: Times, serif;';
@endphp
@section('content')
{{-- <div class="row">
    <h1>الدرجات للطالب {{ $student->name }}</h1>
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center;">
        <thead>
            <tr style="background-color: rgb(133, 212, 157)">
                <th>المادة</th>
                <th>أعمال الفصل الأول</th>
                <th>امتحان الفصل الأول</th>
                <th>محصلة الفصل الأول</th> <!-- محصلة الفصل الأول لكل مادة -->
                <th>أعمال الفصل الثاني</th>
                <th>امتحان الفصل الثاني</th>
                <th>محصلة الفصل الثاني</th> <!-- محصلة الفصل الثاني لكل مادة -->
                <th>المعدل السنوي</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($grades as $grade)
                <tr>
                    <td>{{ $grade->subject->name }}</td>
                    <td>{{ $grade->first_term_coursework ?? 'لا توجد درجة' }}</td>
                    <td>{{ $grade->first_term_exam ?? 'لا توجد درجة' }}</td>
                    <td>{{ $grade->first_term_total }}</td>
                    <td>{{ $grade->second_term_coursework ?? 'لا توجد درجة' }}</td>
                    <td>{{ $grade->second_term_exam ?? 'لا توجد درجة' }}</td>
                    <td>{{ $grade->second_term_total }}</td>
                    <td>{{ $grade->yearly_average }}</td>
                    <td> <a href="{{ route('subjectGrade.edit', $grade->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">لا توجد درجات متاحة لهذا الطالب.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <br>
    <br>
    <h3 style="text-align: center">Overall Totals</h3>
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center;">
        <thead>
            <tr style="background-color: rgb(133, 212, 157)">
                <th>الفصل</th>
                <th>إجمالي الدرجات</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>المحصلة الإجمالية للفصل الأول</td>
                <td>{{ $firstTermOverallTotal }}</td>
            </tr>
            <tr>
                <td>المحصلة الإجمالية للفصل الثاني</td>
                <td>{{ $secondTermOverallTotal }}</td>
            </tr>
            <tr>
                <td>المحصلة النهائية</td>
                <td>{{ $finalScore }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ url('/') }}">Back to Home</a>
    </table>
</div> --}}
{{-- <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a> --}}
{{-- <style>
    table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
    }
    th {
        background-color: #ffff99;
    }
    .section-blue {
        background-color: #cce5ff;
    }
    .section-yellow {
        background-color: #ffff99;
    }
    .rotate-text {
        transform: rotate(-90deg);
        writing-mode: vertical-rl;
    }
</style> --}}
{{-- <table>
    <thead>
        <tr>
            <th rowspan="2" class="section-yellow">اسم المادة</th>
            <th colspan="3" class="section-blue">أعمال الطالب</th>
            <th rowspan="2" class="section-blue">المجموع 1</th>
            <th rowspan="2" class="section-blue">الامتحان الفصلي الأول</th>
            <th rowspan="2" class="section-blue">درجة أعمال الطالب 1</th>
            <th rowspan="2" class="section-blue">المجموع 2</th>
            <th rowspan="2" class="section-yellow">المحصلة الأولى</th>
        </tr>
        <tr>
            <th class="section-blue" >شفوي</th>
            <th class="section-blue">وظائف</th>
            <th class="section-blue">مذاكرة</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <td>المادة 1</td>
            <td>2</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>5</td>
            <td>7</td>
            <td>12</td>
            <td>10</td>
        </tr>
        <!-- يمكنك إضافة المزيد من الصفوف حسب الحاجة -->
    </tbody>
</table> --}}
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }
    th, td {
        border: 1px solid black;
        padding: 10px;
    }
    th {
        background-color: yellow;
    }
    .section-blue {
        background-color: #cce5ff;
    }
    .section-orange {
        background-color: #ffe5cc;
    }
    .section-gray {
        background-color: #f2f2f2;
    }
    .section-green {
        background-color: #d9eadd;
    }
    .section-yellow {
        background-color: #ffff99;
    }
</style>
<br>
<h2>درجات للطالب: {{ $student->name }}</h2>
<br>
<table>
    <thead>
        <tr>
            <th colspan="17" class="section-blue">الفصل الأول</th>
            <th colspan="4" class="section-blue">المحصلة الأولى</th>
        </tr>
        <tr>
            <th rowspan="3" class="section-yellow">اسم المادة</th>
            <th colspan="5" class="section-blue">الشهر الأول </th>
            <th colspan="5" class="section-blue">الشهر الثاني </th>
            <th colspan="5" class="section-blue">الشهر الثالث</th>
            <th rowspan="2" class="section-blue">مجموع المتوسطات</th>
            <th rowspan="2" class="section-blue">الدرجة</th>
        </tr>
        <tr>
            <th colspan="1" class="section-blue">مذاكرات شفوية</th>
            <th colspan="1" class="section-blue">تدريبات ووظائف </th>
            <th colspan="1" class="section-blue">درجات اختبار </th>
            <th colspan="1" class="section-blue">المجموع</th>
            <th colspan="1" class="section-blue">المتوسط 1 </th>
            <th colspan="1" class="section-blue">مذاكرات شفوية</th>
            <th colspan="1" class="section-blue">تدريبات ووظائف </th>
            <th colspan="1" class="section-blue">مذاكرات شفوية</th>
            <th colspan="1" class="section-blue">المجموع</th>
            <th colspan="1" class="section-blue">المتوسط 2</th>
            <th colspan="1" class="section-blue">مذاكرات شفوية</th>
            <th colspan="1" class="section-blue">تدريبات ووظائف </th>
            <th colspan="1" class="section-blue">مذاكرات شفوية</th>
            <th colspan="1" class="section-blue">المجموع</th>
            <th colspan="1" class="section-blue">المتوسط 3</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($grades as $grade )
        <tr>
            <td>{{ $grade->subject->name }}</td>
            <td>{{ $grade->oral_grade_first_semester_1 }}</td>
            <td>{{ $grade->homework_grade_first_semester_1 }}</td>
            <td>{{ $grade->quiz_grade_first_semester_1}}</td>
            <td>{{ $grade->total_work_first_1}}</td>
            <td>{{ $grade->average_first_semester_1}}</td>

            <td>{{ $grade->oral_grade_first_semester_2 }}</td>
            <td>{{ $grade->homework_grade_first_semester_2 }}</td>
            <td>{{ $grade->quiz_grade_first_semester_2}}</td>
            <td>{{ $grade->total_work_first_2}}</td>
            <td>{{ $grade->average_first_semester_2}}</td>

            <td>{{ $grade->oral_grade_first_semester_3 }}</td>
            <td>{{ $grade->homework_grade_first_semester_3 }}</td>
            <td>{{ $grade->quiz_grade_first_semester_3}}</td>
            <td>{{ $grade->total_work_first_3}}</td>
            <td>{{ $grade->average_first_semester_3}}</td>
            <td>{{ $grade->total_average_first_semester_1}}</td>
            <td>{{ $grade->degree_first_semester}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="19">لا توجد درجات متاحة لهذا الطالب.</td>
        </tr>
        @endforelse
    </tbody>
    <br>
<table>
    <thead>
        <tr>
            <th colspan="17" class="section-blue">الفصل الثاني </th>
            <th colspan="4" class="section-blue">المحصلة الثانية </th>
        </tr>
        <tr>
            <th rowspan="3" class="section-yellow">اسم المادة</th>
            <th colspan="5" class="section-blue">الشهر الأول </th>
            <th colspan="5" class="section-blue">الشهر الثاني </th>
            <th colspan="5" class="section-blue">الشهر الثالث </th>
            <th rowspan="2" class="section-blue">مجموع المتوسطات</th>
            <th rowspan="2" class="section-blue">الدرجة</th>
        </tr>
        <tr>
            <th colspan="1" class="section-blue">مذاكرات شفوية</th>
            <th colspan="1" class="section-blue">تدريبات ووظائف </th>
            <th colspan="1" class="section-blue">درجات اختبار </th>
            <th colspan="1" class="section-blue">المجموع</th>
            <th colspan="1" class="section-blue">المتوسط 1 </th>
            <th colspan="1" class="section-blue">مذاكرات شفوية</th>
            <th colspan="1" class="section-blue">تدريبات ووظائف </th>
            <th colspan="1" class="section-blue">مذاكرات شفوية</th>
            <th colspan="1" class="section-blue">المجموع</th>
            <th colspan="1" class="section-blue">المتوسط 2</th>
            <th colspan="1" class="section-blue">مذاكرات شفوية</th>
            <th colspan="1" class="section-blue">تدريبات ووظائف </th>
            <th colspan="1" class="section-blue">مذاكرات شفوية</th>
            <th colspan="1" class="section-blue">المجموع</th>
            <th colspan="1" class="section-blue">المتوسط 3</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($grades as $grade )
        <tr>
            <td>{{ $grade->subject->name }}</td>
            <td>{{ $grade->oral_grade_second_semester_1 }}</td>
            <td>{{ $grade->homework_grade_second_semester_1 }}</td>
            <td>{{ $grade->quiz_grade_second_semester_1}}</td>
            <td>{{ $grade->total_work_second_1}}</td>
            <td>{{ $grade->average_second_semester_1}}</td>

            <td>{{ $grade->oral_grade_second_semester_2 }}</td>
            <td>{{ $grade->homework_grade_second_semester_2 }}</td>
            <td>{{ $grade->quiz_grade_second_semester_2}}</td>
            <td>{{ $grade->total_work_second_2}}</td>
            <td>{{ $grade->average_second_semester_2}}</td>

            <td>{{ $grade->oral_grade_second_semester_3 }}</td>
            <td>{{ $grade->homework_grade_second_semester_3 }}</td>
            <td>{{ $grade->quiz_grade_second_semester_3}}</td>
            <td>{{ $grade->total_work_second_3}}</td>
            <td>{{ $grade->average_second_semester_3}}</td>
            <td>{{ $grade->total_average_second_semester_1}}</td>
            <td>{{ $grade->degree_second_semester}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="19">لا توجد درجات متاحة لهذا الطالب.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
