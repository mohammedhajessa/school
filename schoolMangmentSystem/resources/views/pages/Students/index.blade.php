@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Students_trans.list_students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Students_trans.list_students') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<style>
    .size{
        width: 500px;
    }
</style>
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <a href="{{ route('Students.create') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{ trans('Students_trans.add_student') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead style="width: 200px">
                                        <tr style="width: 200px">
                                            <th>#</th>
                                            <th style="width:200px">{{ trans('Students_trans.Name_Student') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.student_code') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.classrooms') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Grade') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.section') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.email') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.gender') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.academic_year') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.failed_classes') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Name_Father') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Name_Mother') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Name_Grand') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Phone_Father') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Phone_Mother') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Trust') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.record') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.record_number') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.record_place') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Date_Birth') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.place_birth') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.nationalNumber') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.enrollment_date') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.failed_classes') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.failed_classes_prev_School') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.subjects_excellent_in') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.subjects_weak_in') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.transfer_document_number') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.transfer_document_date') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.reason_for_leaving_school') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.previous_class') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.residence_status') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.date_of_leaving_previous_class') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.disability_type') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.is_orphan') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.medical_report') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Processes') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Processes') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Processes') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Processes') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Processes') }}</th>
                                            <th style="width:200px">{{ trans('Students_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td >{{ $loop->index + 1 }}</td>
                                                <td >{{ $loop->index + 1 }}</td>
                                                <td >{{ $loop->index + 1 }}</td>
                                                <td >{{ $loop->index + 1 }}</td>
                                                <td >{{ $loop->index + 1 }}</td>
                                                <td >{{ $student->name }}</td>
                                                <td >{{ $student->student_code }}</td>
                                                <td >{{ $student->grade->Name }}</td>
                                                <td >{{ $student->classroom->Name_Class }}</td>
                                                <td >{{ $student->section->Name }}</td>
                                                <td >{{ $student->email }}</td>
                                                <td >{{ $student->Gender->Name }}</td>
                                                <td >{{ $student->academic_year }}</td>
                                                <td >{{ $student->failed_classes }}</td>
                                                <td >{{ $student->parent->Name_Father }}</td>
                                                <td >{{ $student->parent->Name_Grand }}</td>
                                                <td >{{ $student->parent->Name_Mother }}</td>
                                                <td >{{ $student->parent->Phone_Father }}</td>
                                                <td >{{ $student->parent->Phone_Mother }}</td>
                                                <td >{{ $student->Trust }}</td>
                                                <td >{{ $student->record }}</td>
                                                <td >{{ $student->record_number }}</td>
                                                <td >{{ $student->record_place }}</td>
                                                <td >{{ $student->Date_Birth }}</td>
                                                <td >{{ $student->place_birth }}</td>
                                                <td >{{ $student->nationalNumber }}</td>
                                                <td >{{ $student->enrollment_date??'no data' }}</td>
                                                <td >{{ $student->failed_classes??'no data' }}</td>
                                                <td >{{ $student->failed_classes_prev_School??'no data' }}</td>
                                                <td >{{ $student->subjects_excellent_in ??'no data'}}</td>
                                                <td >{{ $student->subjects_weak_in??'no data' }}</td>
                                                <td >{{ $student->transfer_document_number??'no data' }}</td>
                                                <td >{{ $student->transfer_document_date??'no data' }}</td>
                                                <td >{{ $student->reason_for_leaving_school??'no data' }}</td>
                                                <td >{{ $student->previous_class??'no data' }}</td>
                                                <td >{{ $student->residence_status ??'no data'}}</td>
                                                <td >{{ $student->date_of_leaving_previous_class??'no data' }}</td>
                                                <td >
                                                    @if ($student->disability_type)
                                                <td> الطالب معاق</td>
                                                    @else
                                                <td>الطالب سليم</td>
                                                @endif
                                                </td>
                                                @if ($student->is_orphan)
                                                    <td>الطالب يتيم</td>
                                                @else
                                                    <td>الطالب ليس يتيمًا</td>
                                                @endif
                                                <td>
                                                    @if ($student->medical_report_path)
                                                        <a href="{{ Storage::url($student->medical_report_path) }}"
                                                            class="btn btn-warning btn-sm" role="button"
                                                            aria-pressed="true">عرض التقرير</a>
                                                    @else
                                                        <p>لا يوجد تقرير</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('Students.edit', $student->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_Student{{ $student->id }}"
                                                        title="{{ trans('Grades_trans.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('pages.Students.Delete')

                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
