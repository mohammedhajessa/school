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
{{-- @section('content') --}}
{{-- <div class="container">
    <h2>إضافة درجات للطالب: {{ $student->name }}</h2>
    <br>
    <form action="{{ route('subjectGrade.store') }}" method="POST">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}">

        <div class="form-group">
            <label for="subject_id" style="{{ $style }}">اختر المادة</label>
            <select name="subject_id" id="subject_id" class="custom-select my-1 mr-sm-2">
                @foreach($subjects as $subject)
                    <option style="{{ $style }}" value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <h3>علامات الفصل الأول</h3>
        <br>
        <div class="form-group">
            <label for="first_term_coursework" style="{{ $style }}">أعمال الفصل الأول:</label>
            <input type="number" name="first_term_coursework" id="first_term_coursework" step="0.01" min="0" max="100" class="form-control" style="{{ $style }}">
        </div>
        <div class="form-group" >
            <label for="first_term_exam" style="{{ $style }}">امتحان الفصل الأول:</label>
            <input type="number" name="first_term_exam" id="first_term_exam" step="0.01" min="0" max="100" class="form-control" style="{{ $style }}">
        </div>
        <br>
        <h3>علامات الفصل الثاني</h3>
        <br>
        <div class="form-group" >
            <label for="second_term_coursework" style="{{ $style }}">أعمال الفصل الثاني:</label>
            <input type="number" name="second_term_coursework" id="second_term_coursework" step="0.01" min="0" max="100" class="form-control" style="{{ $style }}">
        </div>
        <div class="form-group" >
            <label for="second_term_exam" style="{{ $style }}">امتحان الفصل الثاني:</label>
            <input type="number" name="second_term_exam" id="second_term_exam" step="0.01" min="0" max="100" class="form-control" style="{{ $style }}">
        </div>
        <button type="submit" class="btn btn-primary" style="{{ $style }}">حفظ</button>
        <a href="{{ route('subjectGrade.show', $student->id) }}" class="btn btn-warning btn-sm" role="button" aria-pressed="true" style="{{ $style }}">عرض الدرجات</a>
</div> --}}

@section('content')
    <h1>تعديل درجة للطالب {{ $grade->student->name }}</h1>

    <form action="{{ route('grades.update', $grade->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="subject_id">اختر المادة:</label>
            <select name="subject_id" id="subject_id" class="form-control">
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $grade->subject_id == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="first_term_coursework">أعمال الفصل الأول:</label>
            <input type="number" name="first_term_coursework" class="form-control" min="0" max="100" value="{{ $grade->first_term_coursework }}">
        </div>

        <div class="form-group">
            <label for="first_term_exam">امتحان الفصل الأول:</label>
            <input type="number" name="first_term_exam" class="form-control" min="0" max="100" value="{{ $grade->first_term_exam }}">
        </div>

        <div class="form-group">
            <label for="second_term_coursework">أعمال الفصل الثاني:</label>
            <input type="number" name="second_term_coursework" class="form-control" min="0" max="100" value="{{ $grade->second_term_coursework }}">
        </div>

        <div class="form-group">
            <label for="second_term_exam">امتحان الفصل الثاني:</label>
            <input type="number" name="second_term_exam" class="form-control" min="0" max="100" value="{{ $grade->second_term_exam }}">
        </div>

        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
    </form>
@endsection
<br>
<br>
{{-- @endsection --}}
