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
{{-- @extends('layouts.app') <!-- تأكد من استيراد التخطيط العام للتطبيق الخاص بك --> --}}

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">سجل الحضور</h1>

        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
            <thead>
                <tr style="background-color: rgb(137, 218, 148)">
                    <th>التاريخ</th>
                    <th>الحالة</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->attendence_date }}</td>
                        <td>{{ $attendance->attendence_status == 1 ? 'حضور' : 'غياب' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
            <thead>
                <tr style="background-color: rgb(137, 218, 148)">
                    <th>عدد أيام الحضور:</th>
                    <th>عدد أيام الغياب</th>
                    <th>نسبة الحضور</th>
                    <th>نسبة الغياب:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $presentDays }}</td>
                    <td> {{ $absentDays }}</td>
                    <td>{{ number_format($presentPercentage, 2) }}%</td>
                    <td>{{ number_format($absentPercentage, 2) }}%</td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- <div class="row">
        <a href="{{ route('Attendance.destroy',$student->id) }}"
            class="btn btn-warning danger" role="button" aria-pressed="true">إضافة درجات</a>
    </div> --}}
@endsection
