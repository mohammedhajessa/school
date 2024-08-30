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
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal"
                    style="{{ $style }}">
                    اضافة شعبة جديد</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="{{ $style }}">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">

                        @foreach ($Grades as $Grade)
                            <div class="acd-group">
                                <a href="#" class="acd-heading"
                                    style="{{ $style }}">{{ $Grade->Name }}</a>
                                <div class="acd-des">

                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark" style="{{ $style }}">
                                                                    <th>#</th>
                                                                    <th>اسم الشعبة</th>
                                                                    <th>اسم الصف</th>
                                                                    <th>العمليات</th>
                                                                    <th>قائمة الطلاب</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($Grade->Sections as $list_Sections)
                                                                    <tr style="{{ $style }}text-algin:center;">
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $list_Sections->Name }}</td>
                                                                        <td>{{ $list_Sections->My_Classes->Name_Class }}
                                                                        </td>
                                                                        <td>

                                                                            <a href="#"
                                                                                class="btn btn-outline-info btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#edit{{ $list_Sections->id }}"
                                                                                style="{{ $style }}">تعديل</a>
                                                                            <a href="#"
                                                                                class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#delete{{ $list_Sections->id }}"
                                                                                style="{{ $style }}">حذف</a>
                                                                        </td>
                                                                    </tr>


                                                                    <!--تعديل قسم جديد -->
                                                                    <div class="modal fade"
                                                                        id="edit{{ $list_Sections->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"

                                                                                        id="exampleModalLabel" style="{{ $style }}" >
                                                                                            تعديل الشعبة الدراسية
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form
                                                                                    action="{{ route('section.update') }}"
                                                                                    method="POST">
                                                                                    {{ method_field('patch') }}
                                                                                    {{ csrf_field() }}
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <input type="text"
                                                                                                    name="Name_Section"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_Sections->Name }}">
                                                                                        </div>
                                                                                        <div class="col">
                                                                                                <input id="id"
                                                                                                    type="hidden"
                                                                                                    name="id"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_Sections->id }}">
                                                                                            </div>
                                                                                    </div>
                                                                                    <br>
                                                                                    <div class="col">
                                                                                        <label for="inputName"
                                                                                                class="control-label"style="{{ $style }}">اسم القسم</label>
                                                                                        <select name="Grade_id"
                                                                                                class="custom-select"
                                                                                                onclick="console.log($(this).val())">
                                                                                            <!--placeholder-->
                                                                                            <option
                                                                                                value="{{ $Grade->id }}">
                                                                                                {{ $Grade->Name }}
                                                                                            </option>
                                                                                            @foreach ($list_Grades as $list_Grade)
                                                                                                <option
                                                                                                    value="{{ $list_Grade->id }}">
                                                                                                    {{ $list_Grade->Name }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <br>

                                                                                    <div class="col">
                                                                                        <label for="inputName"
                                                                                               class="control-label"style="{{ $style }}">اسم الصف</label>
                                                                                        <select name="Class_id"
                                                                                                class="custom-select">
                                                                                            <option
                                                                                                value="{{ $list_Sections->My_Classes->id }}">
                                                                                                {{ $list_Sections->My_Classes->Name_Class }}
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <br>
                                                                                    <div class="col">
                                                                                        <label for="inputName" class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                                                                        <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                                                            @foreach($list_Sections->teachers as $teacher)
                                                                                                <option selected value="{{$teacher['id']}}">{{$teacher['Name']}}</option>
                                                                                            @endforeach

                                                                                            @foreach($teachers as $teacher)
                                                                                                <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal"style="{{ $style }}">الغاء</button>
                                                                                <button type="submit"
                                                                                        class="btn btn-danger"style="{{ $style }}">تأكيد</button>
                                                                            </div>
                                                                            </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- delete_modal_Grade -->
                                                                    <div class="modal fade"
                                                                        id="delete{{ $list_Sections->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        حذف الشعبة
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="{{ route('section.delete') }}"
                                                                                        method="post">
                                                                                        {{ method_field('delete') }}
                                                                                        @csrf
                                                                                        <h1 style="{{ $style }}">سيتم حذف الشعبة بشكل نهائي.هل تريد التأكيد؟</h1>
                                                                                        <input id="id" type="hidden"
                                                                                                name="id"
                                                                                                class="form-control"
                                                                                                value="{{ $list_Sections->id }}">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal" style="{{ $style }}">الغاء</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-danger" style="{{ $style }}">حذف</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!--اضافة قسم جديد -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="{{ $style }}" id="exampleModalLabel">
                                اضافة قسم</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('section.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="Name" class="form-control"
                                            placeholder="اسم القسم" style="{{ $style }}" required>
                                    </div>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="inputName" class="control-label" style="{{ $style }}">اسم
                                        المرحلة</label>
                                    <select name="Grade_id" class="custom-select"
                                        onchange="console.log($(this).val())"
                                        style="{{ $style }}text-algin:center;padding-bottom:2px" required>
                                        <!--placeholder-->
                                        <option value="" selected disabled style="{{ $style }}">المرحلة
                                        </option>
                                        @foreach ($list_Grades as $list_Grade)
                                            <option value="{{ $list_Grade->id }}" style="{{ $style }}">
                                                {{ $list_Grade->Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>

                                <br>
                                <div class="col">
                                    <label for="inputName"
                                           class="control-label" style="{{ $style }}">اسم الصف</label>
                                    <select name="Class_id" class="custom-select">
                                    </select>
                                </div><br>

                                <div class="col">
                                    <label for="inputName" class="control-label" style="{{ $style }}">اسم المعلم </label>
                                    <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2" style="{{ $style }}">
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal"style="{{ $style }}">اغلاق</button>
                            <button type="submit" class="btn btn-success"
                                style="{{ $style }}">اضافة</button>
                        </div>
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
<script>
    $(document).ready(function() {
        $('select[name="Grade_id"]').on('change', function() {
            var grade_Id = $(this).val();
            if (grade_Id) {
                $.ajax({
                    url: '/classes/' + grade_Id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var classSelect = $('select[name="Class_id"]');
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
                $('select[name="Class_id"]').empty(); // تفريغ القائمة في حال لم يتم اختيار مرحلة
            }
        });
    });
</script>

@endsection
