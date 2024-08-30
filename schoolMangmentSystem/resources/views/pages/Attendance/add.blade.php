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
<form action="{{ route('subjectGrade.store') }}" method="post">
    @csrf
    <h2>إضافة درجات للطالب: {{ $student->name }}</h2>
    <input type="hidden" name="student_id" value="{{ $student->id }}">
    <div class="form-group">
        <label for="subject_id" style="{{ $style }}">اختر المادة</label>
        <select name="subject_id" id="subject_id" class="custom-select my-1 mr-sm-2">
            @foreach ($subjects as $subject)
                <option style="{{ $style }}" value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <h2>الفصل الأول:</h2>
    <br>
    <h3>الشهر الأول :</h3>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>مذاكرات شفوية : <span class="text-danger">*</span></label>
                <input type="text" name="oral_grade_first_semester_1" class="form-control">
            </div>
            @error('oral_grade_first_semester_1')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>تدريبات ووظائف  : <span class="text-danger">*</span></label>
                <input typetype="number" " name="homework_grade_first_semester_1" class="form-control">
            </div>
            @error('homework_grade_first_semester_1')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>درجات اختبار  : <span class="text-danger">*</span></label>
                <input type="number"  name="quiz_grade_first_semester_1" class="form-control">
            </div>
            @error('quiz_grade_first_semester_1')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
    <h3>الشهر الثاني  :</h3>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>مذاكرات شفوية : <span class="text-danger">*</span></label>
                <input type="number"  name="oral_grade_first_semester_2" class="form-control">
            </div>
            @error('oral_grade_first_semester_2')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>تدريبات ووظائف  : <span class="text-danger">*</span></label>
                <input type="number"  name="homework_grade_first_semester_2" class="form-control">
            </div>
            @error('homework_grade_first_semester_2')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>درجات اختبار  : <span class="text-danger">*</span></label>
                <input type="number"  name="quiz_grade_first_semester_2" class="form-control">
            </div>
            @error('quiz_grade_first_semester_2')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
    <h3>الشهر الثالث:</h3>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>مذاكرات شفوية : <span class="text-danger">*</span></label>
                <input type="number"  name="oral_grade_first_semester_3" class="form-control">
            </div>
            @error('oral_grade_first_semester_3')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>تدريبات ووظائف  : <span class="text-danger">*</span></label>
                <input type="number"  name="homework_grade_first_semester_3" class="form-control">
            </div>
            @error('homework_grade_first_semester_3')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>درجات اختبار  : <span class="text-danger">*</span></label>
                <input type="number"  name="quiz_grade_first_semester_3" class="form-control">
            </div>
            @error('quiz_grade_first_semester_3')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
    <h2>الفصل الثاني:</h2>
    <br>
    <h3>الشهر الأول :</h3>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>مذاكرات شفوية : <span class="text-danger">*</span></label>
                <input type="number"  name="oral_grade_second_semester_1" class="form-control">
            </div>
            @error('oral_grade_second_semester_1')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>تدريبات ووظائف  : <span class="text-danger">*</span></label>
                <input type="number"  name="homework_grade_second_semester_1" class="form-control">
            </div>
            @error('homework_grade_second_semester_1')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>درجات اختبار  : <span class="text-danger">*</span></label>
                <input type="number"  name="quiz_grade_second_semester_1" class="form-control">
            </div>
            @error('quiz_grade_second_semester_1')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
    <h3>الشهر الثاني  :</h3>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>مذاكرات شفوية : <span class="text-danger">*</span></label>
                <input type="number"  name="oral_grade_second_semester_2" class="form-control">
            </div>
            @error('oral_grade_second_semester_2')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>تدريبات ووظائف  : <span class="text-danger">*</span></label>
                <input type="number"  name="homework_grade_second_semester_2" class="form-control">
            </div>
            @error('homework_grade_second_semester_2')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>درجات اختبار  : <span class="text-danger">*</span></label>
                <input type="number"  name="quiz_grade_second_semester_2" class="form-control">
            </div>
            @error('quiz_grade_second_semester_2')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
    <h3>الشهر الثالث:</h3>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>مذاكرات شفوية : <span class="text-danger">*</span></label>
                <input type="number"  name="oral_grade_second_semester_3" class="form-control">
            </div>
            @error('oral_grade_second_semester_3')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>تدريبات ووظائف  : <span class="text-danger">*</span></label>
                <input type="number"  name="homework_grade_second_semester_3" class="form-control">
            </div>
            @error('homework_grade_second_semester_3')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>درجات اختبار  : <span class="text-danger">*</span></label>
                <input type="number"  name="quiz_grade_second_semester_3" class="form-control">
            </div>
            @error('quiz_grade_second_semester_3')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary" style="{{ $style }}">حفظ</button>
    <a href="{{ route('subjectGrade.show', $student->id) }}" class="btn btn-warning btn-sm" role="button"
        aria-pressed="true" style="{{ $style }}">عرض الدرجات</a>
</form>
<br>
<br>
@endsection
{{-- @section('content')
    <h1>Grades for {{ $student->name }}</h1>

    <form action="{{ route('subjectGrade.store') }}" method="POST">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}">

        <div>
            <label for="subject_id">Subject:</label>
            <select name="subject_id" id="subject_id" required>
                @foreach (\App\Models\Subject::all() as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="grade">Grade:</label>
            <input type="number" name="grade" id="grade" step="0.01" min="0" max="100" required>
        </div>

        <button type="submit">Save Grade</button>
    </form>
@endsection --}}
