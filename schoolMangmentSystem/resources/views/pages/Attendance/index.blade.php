@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    قائمة الحضور والغياب للطلاب
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    قائمة الحضور والغياب للطلاب
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-danger">
        <ul>
            <li>{{ session('status') }}</li>
        </ul>
    </div>
@endif

<style>
    .table-responsive {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch; /* لدعم التمرير السلس على الأجهزة التي تعمل باللمس */
}
</style>


<h5 style="font-family: 'Cairo', sans-serif;color: red"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
{{-- <input type="date" value=" {{ date('Y-m-d') }}"> --}}
<form method="post" action="{{ route('Attendance.store') }}">

    @csrf
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center;" >
        <thead>
            <tr>
                <th class="alert-success">#</th>
                <th class="alert-success">{{ trans('Students_trans.name') }}</th>
                <th class="alert-success">{{ trans('Students_trans.email') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Name_Father') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Name_Mother') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Phone_Father') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Phone_Mother') }}</th>
                <th class="alert-success">{{ trans('Students_trans.gender') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
                <th class="alert-success">{{ trans('Students_trans.classrooms') }}</th>
                <th class="alert-success">{{ trans('Students_trans.is_orphan') }}</th>
                <th class="alert-success">{{ trans('Students_trans.section') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Processes') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Processes') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Processes') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Processes') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->parent->Name_Father }}</td>
                    <td>{{ $student->parent->Name_Mother }}</td>
                    <td>{{ $student->parent->Phone_Father}}</td>
                    <td>{{ $student->parent->Phone_Mother}}</td>
                    <td>{{ $student->gender->Name }}</td>
                    <td>{{ $student->grade->Name }}</td>
                    <td>{{ $student->classroom->Name_Class }}</td>
                    <td>{{ $student->parent->is_orphan }}</td>
                    <td>{{ $student->section->Name }}</td>
                    <td>

                        @if(isset($student->attendance()->where('attendence_date',date('Y-m-d'))->first()->student_id))

                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" disabled
                                       {{ $student->attendance()->first()->attendence_status == 1 ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="presence">
                                <span class="text-success">حضور</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]" disabled
                                       {{ $student->attendance()->first()->attendence_status == 0 ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="absent">
                                <span class="text-danger">غياب</span>
                            </label>

                        @else

                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                       value="presence">
                                <span class="text-success">حضور</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                       value="absent">
                                <span class="text-danger">غياب</span>
                            </label>

                        @endif

                        <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                        <input type="hidden" name="grade_id" value="{{ $student->Grade_id }}">
                        <input type="hidden" name="classroom_id" value="{{ $student->Classroom_id }}">
                        <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                    </td>
                    <td>
                        <a href="{{ route('subjectGrade.create', ['student' => $student->id]) }}"
                            class="btn btn-warning btn-sm" role="button" aria-pressed="true">إضافة درجات</a>
                    </td>
                    <td>
                        <a href="{{ route('subjectGrade.show', $student->id) }}" class="btn btn-warning btn-sm"
                            role="button" aria-pressed="true">عرض الدرجات</a>
                    </td>
                    <td>
                        <a href="{{ route('Attendance.edit',$student->id) }}" class="btn btn-warning btn-sm"
                            role="button" aria-pressed="true">  عرض سجل الحضور</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <P>
        <button class="btn btn-success" type="submit">{{ trans('Students_trans.submit') }}</button>
    </P>
</form><br>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
