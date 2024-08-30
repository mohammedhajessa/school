@extends('layouts.master')
@section('css')
@section('title')
    إضافة معلم جديد
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    إضافة معلم جديد
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
                            <strong style="{{ $style }}">{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="" method="post">
                                @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title"style="{{ $style }}">الإيميل:</label>
                                    <input type="email" name="Email" class="form-control"style="{{ $style }}" >
                                    @error('Email')
                                    <div class="alert alert-danger"style="{{ $style }}">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title"style="{{ $style }}">كلمة السر:</label>
                                    <input type="password" name="Password" class="form-control"style="{{ $style }}">
                                    @error('Password')
                                    <div class="alert alert-danger"style="{{ $style }}">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title"style="{{ $style }}">رقم الهاتف:</label>
                                    <input type="text" name="Phone" class="form-control"style="{{ $style }}">
                                    @error('Phone')
                                    <div class="alert alert-danger"style="{{ $style }}">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title"style="{{ $style }}">الإسم الكامل</label>
                                    <input type="text" name="Name_ar" class="form-control"style="{{ $style }}">
                                    @error('Name_ar')
                                    <div class="alert alert-danger"style="{{ $style }}"style="{{ $style }}">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity"style="{{ $style }}">التخصص:</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                        <option selected disabledstyle="{{ $style }}">اختر...</option>
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
                                        <option selected disabledstyle="{{ $style }}">اختر...</option>
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
                                    <label for="title"style="{{ $style }}">تاريخ الإنضمام:</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text"  id="datepicker-action" name="Joining_Date" data-date-format="yyyy-mm-dd"  >
                                    </div>
                                    @error('Joining_Date')
                                    <div class="alert alert-danger"style="{{ $style }}">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group"style="{{ $style }}">
                                <label for="exampleFormControlTextarea1">العنوان:</label>
                                <textarea class="form-control" name="Address"style="{{ $style }}"
                                            id="exampleFormControlTextarea1" rows="4"></textarea>
                                @error('Address')
                                <div class="alert alert-danger"style="{{ $style }}">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit"style="{{ $style }}">تأكيد</button>
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
    @toastr_js
    @toastr_render
@endsection
