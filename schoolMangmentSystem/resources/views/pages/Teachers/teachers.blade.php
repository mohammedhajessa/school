@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('title')
   المعلمين
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة المعلمين
@stop
<!-- breadcrumb -->
@endsection
@php
    $style = "font-size:20px;font-family: Times, serif;"
@endphp
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body" >
                                <a href="{{ route('Teacher.create') }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true" style="{{ $style }}">إضافة معلم</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr style="{{ $style }}">
                                            <th>#</th>
                                            <th>الاسم الكامل</th>
                                            <th>الجنس</th>
                                            <th>تاريخ التعيين</th>
                                            <th>التخصص</th>
                                            <th>الإيميل</th>
                                            <th>رقم الهاتف</th>
                                            <th>العنوان</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($Teachers as $Teacher)
                                            <tr style="{{ $style }}">
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{$Teacher->Name}}</td>
                                            <td>{{$Teacher->genders->Name}}</td>
                                            <td>{{$Teacher->Joining_Date}}</td>
                                            <td>{{$Teacher->specializations->Name}}</td>
                                            <td>{{$Teacher->Email}}</td>
                                            <td>{{$Teacher->Phone}}</td>
                                            <td>{{$Teacher->Address}}</td>
                                                <td>
                                                    <a href="{{ route('Teacher.edit',$Teacher->id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Teacher{{ $Teacher->id }}" title="خذف المعلم"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_Teacher{{$Teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('Teacher.delete') }}" method="post">
                                                        {{method_field('delete')}}
                                                        @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف معلم</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="{{ $style }}">
                                                            <p style="{{ $style }}"> سيتم حذف المعلم نهائيا.هل تريد التأكيد؟</p>
                                                            <input type="hidden" name="id"  value="{{$Teacher->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer" style="{{ $style }}">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal" style="{{ $style }}">الغاء</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger" style="{{ $style }}">حذف</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
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
