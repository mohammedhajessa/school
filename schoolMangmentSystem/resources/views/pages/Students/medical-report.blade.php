@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Students_trans.Student_Edit')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('Students_trans.Student_Edit')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<h1>التقرير الطبي</h1>
<div class="report-container">
    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
        <!-- عرض الصورة -->
        <img src="{{ Storage::url($filePath) }}" alt="التقرير الطبي">
    @elseif ($fileExtension == 'pdf')
        <!-- عرض ملف PDF -->
        <iframe src="{{ Storage::url($filePath) }}" frameborder="0"></iframe>
    @else
        <p>نوع الملف غير مدعوم.</p>
    @endif
</div>
@endsection
