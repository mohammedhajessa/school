@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.add_student')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.add_student')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <form method="post"  action="{{ route('Students.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students_trans.personal_information')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name"  class="form-control">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.student_code')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="student_code"  class="form-control">
                                </div>
                                @error('student_code')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.Trust')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Trust" type="text" >
                                </div>
                                @error('Trust')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم الوثيقة في السجل المدني  : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="nationalNumber" type="text" >
                                </div>
                                @error('nationalNumber')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.record')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="record" type="text" >
                                </div>
                                @error('record')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.record_number')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="record_number" type="text" >
                                </div>
                                @error('record_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.record_place')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="record_place" type="text" >
                                </div>
                                @error('record_place')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.place_birth')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="place_birth" type="text" >
                                </div>
                                @error('place_birth')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم وثيقة النقل: </label>
                                    <input  class="form-control" name="transfer_document_number" type="text" >
                                </div>
                                @error('transfer_document_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">{{trans('Students_trans.current_city')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="current_province_id">
                                        <option selected disabled>{{trans('Students_trans.Choose')}}...</option>
                                        @foreach($citys as $city)
                                            <option  value="{{ $city->id }}">{{ $city->Name }}</option>
                                        @endforeach
                                    </select>
                                    @error('current_city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">{{trans('Students_trans.original_city')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="original_province_id">
                                        <option selected disabled>{{trans('Students_trans.Choose')}}...</option>
                                        @foreach($citys as $city)
                                            <option  value="{{ $city->id }}">{{ $city->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('original_city')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.email')}} : </label>
                                    <input type="email"  name="email" class="form-control" >
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.password')}} :</label>
                                    <input  type="password" name="password" class="form-control" >
                                </div>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">{{trans('Students_trans.gender')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id">
                                        <option selected disabled>{{trans('Students_trans.Choose')}}...</option>
                                        @foreach($Genders as $Gender)
                                            <option  value="{{ $Gender->id }}">{{ $Gender->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nal_id">{{trans('Students_trans.Nationality')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="nationalitie_id">
                                        <option selected disabled>{{trans('Students_trans.Choose')}}...</option>
                                        @foreach($nationals as $nal)
                                            <option  value="{{ $nal->id }}">{{ $nal->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('nationalitie_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bg_id">{{trans('Students_trans.blood_type')}} : </label>
                                    <select class="custom-select mr-sm-2" name="blood_id">
                                        <option selected disabled>{{trans('Students_trans.Choose')}}...</option>
                                        @foreach($bloods as $bg)
                                            <option value="{{ $bg->id }}">{{ $bg->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('blood_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.Date_of_Birth')}}  :</label>
                                    <input class="form-control" type="date"  id="datepicker-action" name="Date_Birth" data-date-format="yyyy-mm-dd">
                                </div>
                                @error('date birth')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>تاريخ تركه الصف السابق :</label>
                                    <input class="form-control" type="date"  id="datepicker-action" name="date_of_leaving_previous_class" data-date-format="yyyy-mm-dd">
                                </div>
                                @error('date_of_leaving_previous_class')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>تاريخ وثيقة النقل :</label>
                                    <input class="form-control" type="date"  id="datepicker-action" name="transfer_document_date" data-date-format="yyyy-mm-dd">
                                </div>
                                @error('transfer_document_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>تاريخ التحاقه بالمدرسة :</label>
                                    <input class="form-control" type="date"  id="datepicker-action" name="enrollment_date" data-date-format="yyyy-mm-dd">
                                </div>
                                @error('enrollment_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-check" style="margin-top:40px;margin-right:40px">
                                <input class="form-check-input" type="checkbox" id="is_orphan" name="is_orphan" value="1">
                                <label class="form-check-label" for="flexCheckDefault" style="font-size: 20px">
                                    يتيم
                                </label>
                            </div>
                            <div class="form-check" style="margin-top:40px;margin-right:40px">
                                <input   class="form-check-input" type="checkbox" id="is_disabled" name="is_disabled" value="1">
                                <label class="form-check-label" for="flexCheckDefault" style="font-size: 20px" name="is_disabled">
                                    معاق
                                </label>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نوع الإعاقة: </label>
                                    <input  class="form-control" name="disability_type" type="text" >
                                </div>
                                @error('disability_type')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="bg_id"> حالة الإقامة: </label>
                                        <select name="residence_status" class="custom-select mr-sm-2" name="blood_id">
                                            <option value="مقيم">مقيم</option>
                                            <option value="نازح">نازح</option>
                                        </select>
                                </div>
                                @error('blood_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6" style="margin-top: 40px;">
                                <div class="form-group">
                                    <label for="medical_report">رفع التقرير الطبي (اختياري):</label>
                                    <input type="file" id="medical_report" name="medical_report" placeholder="رفع">
                                </div>
                                @error('medical_report')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الصف السابق: </label>
                                    <input  class="form-control" name="previous_class" type="text" >
                                </div>
                                @error('previous_class')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students_trans.Student_information')}}</h6><br>
                    <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Grade_id">
                                        <option selected disabled>{{trans('Students_trans.Choose')}}...</option>
                                        @foreach($my_classes as $c)
                                            <option  value="{{ $c->id }}">{{ $c->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('Grade')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Classroom_id">
                                    </select>
                                </div>
                                @error('classrooms')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id">
                                    </select>
                                </div>
                                @error('section')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{trans('Students_trans.parent')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id"  onchange="console.log($(this).val())" id="guardianSelect">
                                        <option selected disabled>{{trans('Students_trans.Choose')}}...</option>
                                        @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->Name_Father }}</option>
                                            <option value="{{ $parent->id }}">{{ $parent->Name_Mother }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('parent')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <input type="text" id="phoneField" placeholder="Guardian's Phone Number" readonly> --}}
                            {{-- <input class="form-control"  type="text" id="phoneField" readonly style="width: 250px;hight:30px" > --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{trans('Students_trans.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            @error('academic_year')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group"style="margin-right:10px;width: 1600px">
                            <label for="academic_year">{{trans('Students_trans.failed_classes')}} : <span class="text-danger"></span></label>
                            <textarea class="form-control" name="failed_classes"
                                        id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <div class="form-group"style="margin-right:10px;width: 1600px">
                            <label for="academic_year">الصفوف الراسبة في المدرسة السابقة: <span class="text-danger"></span></label>
                            <textarea class="form-control" name="failed_classes_prev_School"
                                        id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <div class="form-group"style="margin-right:10px;width: 1600px">
                            <label for="academic_year">المواد المتفوق بها: <span class="text-danger"></span></label>
                            <textarea class="form-control" name="subjects_excellent_in"
                                        id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <div class="form-group"style="margin-right:10px;width: 1600px">
                            <label for="academic_year">المواد الضعيف فيها: <span class="text-danger"></span></label>
                            <textarea class="form-control" name="subjects_weak_in"
                                        id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <div class="form-group"style="margin-right:10px;width: 1600px">
                            <label for="academic_year">سبب المغادرة من المدرسة السابقة: <span class="text-danger"></span></label>
                            <textarea class="form-control" name="reason_for_leaving_school"
                                        id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        </div>
                        <br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
{{-- <script>
    $(document).ready(function() {
        $('#guardianSelect').change(function() {
            var guardianId = $(this).val();

            if (guardianId) {
                $.ajax({
                    url: '/guardians/' + guardianId + '/phone',
                    type: 'GET',
                    success: function(data) {
                        if (data.phone) {
                            $('#phoneField').val(data.phone); // وضع رقم الهاتف في الحقل
                        } else {
                            $('#phoneField').val(''); // تفريغ الحقل إذا لم يتم العثور على رقم الهاتف
                        }
                    },
                    error: function() {
                        $('#phoneField').val('Error retrieving phone number'); // عرض رسالة خطأ
                    }
                });
            } else {
                $('#phoneField').val(''); // تفريغ الحقل إذا لم يتم اختيار ولي أمر
            }
        });
    });
    </script> --}}
{{--
    <script>
        $(document).ready(function () {
            $('select[name="phone_id"]').on('change', function () {
                var phone_id = $(this).val();
                if (phone_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_phone') }}/" + phone_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="phone_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            $('select[name="Grade_id"]').on('change', function() {
                var grade_Id = $(this).val();
                if (grade_Id) {
                    $.ajax({
                        url: '/classes/' + grade_Id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var classSelect = $('select[name="phone_id"]');
                            classSelect.empty(); // تفريغ القائمة قبل تحميل الخيارات الجديدة
                            classSelect.append('<option value="">اختر الصف</option>');
                            $.each(data, function(key, value) {
                                classSelect.append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('select[name="phone_id"]').empty(); // تفريغ القائمة في حال لم يتم اختيار مرحلة
                }
            });
        });
    </script> --}}

@endsection
