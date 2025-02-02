@extends('layouts.master')
@section('css')
@section('title')
    تعديل بيانات المعلمين
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Teacher_trans.Edit_Teacher') }}
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

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('Teacher.update') }}" method="post">
                                {{method_field('patch')}}
                                @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title"style="{{ $style }}">الايميل:</label>
                                    <input type="hidden" value="{{$Teachers->id}}" name="id">
                                    <input type="email" name="Email" value="{{$Teachers->Email}}" class="form-control"style="{{ $style }}">
                                    @error('Email')
                                    <div class="alert alert-danger"style="{{ $style }}">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title"style="{{ $style }}">كلمة السر:</label>
                                    <input type="password" name="Password" value="{{$Teachers->Password}}" class="form-control"style="{{ $style }}">
                                    @error('Password')
                                    <div class="alert alert-danger"style="{{ $style }}">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
                                    <label for="title"style="{{ $style }}">الاسم الكامل</label>
                                    <input type="text" name="Name_ar" value="{{ $Teachers->id}}" class="form-control"style="{{ $style }}">
                                    @error('Name_ar')
                                    <div class="alert alert-danger"style="{{ $style }}">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
                                    <label for="title"style="{{ $style }}">رقم الهاتف</label>
                                    <input type="text" name="Phone" value="{{ $Teachers->Phone}}" class="form-control"style="{{ $style }}">
                                    @error('Phone')
                                    <div class="alert alert-danger"style="{{ $style }}">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity"style="{{ $style }}">التخصص</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                        <option value="{{$Teachers->Specialization_id}}">{{$Teachers->specializations->Name}}</option>
                                        @foreach($specializations as $specialization)
                                            <option value="{{$specialization->id}}">{{$specialization->Name}}</option>
                                        @endforeach
                                    </select>
                                    @error('Specialization_id')
                                    <div class="alert alert-danger"style="{{ $style }}">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState"style="{{ $style }}">الجنس:</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Gender_id">
                                        <option value="{{$Teachers->Gender_id}}">{{$Teachers->genders->Name}}</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->Name}}</option>
                                        @endforeach
                                    </select>
                                    @error('Gender_id')
                                    <div class="alert alert-danger"style="{{ $style }}">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title"style="{{ $style }}">تاريخ التعيين:</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text"  id="datepicker-action"  value="{{$Teachers->Joining_Date}}" name="Joining_Date" data-date-format="yyyy-mm-dd"  required>
                                    </div>
                                    @error('Joining_Date')
                                    <div class="alert alert-danger"style="{{ $style }}">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"style="{{ $style }}">العنوان:</label>
                                <textarea class="form-control" name="Address"
                                            id="exampleFormControlTextarea1" rows="4">{{$Teachers->Address}}</textarea>
                                @error('Address')
                                <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit" style="{{ $style }}">تأكيدالبيانات</button>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    {{-- @toastr_js
    @toastr_render --}}
@endsection
