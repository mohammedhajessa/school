@extends('layouts.master')
{{-- @toastr_css; --}}
@section('css')
<style>
    body {

            background-color: #eee;
        }

        table th,
        table td {
            text-align: center;
        }

        table tr:nth-child(even) {
            background-color: #e4e3e3
        }

        th {
            background: #333;
            color: #fff;
        }

        .pagination {
            margin: 0;
        }

        .pagination li:hover {
            cursor: pointer;
        }

        .header_wrap {
            padding: 30px 0;
        }

        .num_rows {
            width: 20%;
            float: left;
        }

        .tb_search {
            width: 20%;
            float: right;
        }

        .pagination-container {
            width: 70%;
            float: left;
        }

        .rows_count {
            width: 20%;
            float: right;
            text-align: right;
            color: #999;
        }
    </style>
@section('title')
    {{ trans('My_Classes_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('My_Classes_trans.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@php
    $style = "font-size:20px;font-family: Times, serif;"
@endphp
@section('content')
<!-- row -->
<div class="row">

<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal" style="{{ $style }};margin-bottom:10px">
                اضافة صف
            </button>
            <br><br>
            <div class="table-responsive">
                {{-- <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                style="text-align: center">
                <thead>
                    <tr>
                        <th>#</th>
                            <th>اسم الصف</th>
                            <th>اسم المرحلة</th>
                            <th>العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($classes as $class)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $class->Name_Class }}</td>
                                <td>{{ $class->grades->Name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $class->id }}"
                                        title="edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $class->id }}"
                                        title="delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $class->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                edit
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('classess.update') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                                class="mr-sm-2">Class Name
                                                            :</label>
                                                        <input id="Name" type="text" name="Name"
                                                                class="form-control"
                                                                value="{{ $class->Name_Class }}"
                                                                required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $class->id }}">
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">Name Grade
                                                        :</label>
                                                    <select class="form-control form-control-lg"
                                                            id="exampleFormControlSelect1" name="Grade_id">
                                                        <option value="{{ $class->grades->id }}">
                                                            {{ $class->grades->Name }}
                                                        </option>
                                                        @foreach ($grades as $Grade)
                                                            <option value="{{ $Grade->id }}">
                                                                {{ $Grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">close</button>
                                                    <button type="submit"
                                                            class="btn btn-success">add</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $class->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                delete grade
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('classess.delete') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                Warning
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $class->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">close</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </table> --}}
                <div hx-get="{{ route('classes.index') }}" hx-trigger="every 1s">
                    <!-- سيتم تحديث هذا العنصر كل 5 ثوانٍ -->
                    <div class="table-responsive">
                        <div class="container">
                            <div class="header_wrap">
                                <div class="num_rows">

                                    <div class="form-group">
                                        <select class  ="form-control" name="state" id="maxRows" style="text-align: center;padding:10px;border-radius:10px;margin-top:10px">
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="70">70</option>
                                            <option value="100">100</option>
                                            <option value="5000">Show ALL Rows</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="tb_search">
                                    <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()"
                                    placeholder="بحث.." class="form-control" style="font-size:18px;border-radius:10px;margin-bottom:20px">
                                </div>
                            </div>
                            <table class="table table-striped table-class" id= "table-id">


                                <thead>
                                    <tr style="{{ $style }}" >
                                        <th>الاسم</th>
                                        <th>المرحلة</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes as $class)
                                        <tr style="{{ $style }}">
                                            <td>{{ $class->Name_Class }}</td>
                                            <td>{{ $class->grades->Name }}</td>
                                            <td> <button type="button" class="btn btn-info btn-sm"
                                                    data-toggle="modal" data-target="#edit{{ $class->id }}"
                                                    title="edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-toggle="modal" data-target="#delete{{ $class->id }}"
                                                    title="delete"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                       <!-- edit_modal_Grade -->
                                    <div class="modal fade" id="edit{{ $class->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel" style="{{ $style }}">
                                                    edit
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ route('classess.update') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                    class="mr-sm-2" style="{{ $style }}">Class Name
                                                                :</label>
                                                            <input id="Name" type="text" name="Name"
                                                                    class="form-control"
                                                                    value="{{ $class->Name_Class }}"
                                                                    required style="{{ $style }}">
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                    value="{{ $class->id }}" style="{{ $style }}">
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1" style="{{ $style }}">Name Grade
                                                            :</label>
                                                        <select class="form-control form-control-lg"
                                                                id="exampleFormControlSelect1" name="Grade_id" style="text-align: center;padding:10px;font-size:18px">
                                                            <option value="{{ $class->grades->id }}">
                                                                {{ $class->grades->Name }}
                                                            </option>
                                                            @foreach ($grades as $Grade)
                                                                <option value="{{ $Grade->id }}">
                                                                    {{ $Grade->Name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal" style="{{ $style }}">close</button>
                                                        <button type="submit"
                                                                class="btn btn-success" style="{{ $style }}">add</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $class->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel" style="{{ $style }}">
                                                    delete Class
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('classess.delete') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    <h4>Warning</h4>
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $class->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" style="{{ $style }}">close</button>
                                                        <button type="submit"
                                                            class="btn btn-danger" style="{{ $style }}">delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                <tbody>
                            </table>

                            <!--		Start Pagination -->
                            <div class='pagination-container'>
                                <nav>
                                    <ul class="pagination">
                                        <!--	Here the JS Function Will Add the Rows -->
                                    </ul>
                                </nav>
                            </div>
                            <div class="rows_count">Showing 11 to 20 of 91 entries</div>

                        </div> <!-- 		End of Container -->



                        <!--  Developed By Yasser Mas -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel" style="{{ $style }}">
                    Add
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class=" row mb-30" action="{{ route('classess.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2" style="{{ $style }}">اسم الصف</label>
                                            <input class="form-control" type="text" name="Name" required/>
                                        </div>
                                        <div class="col">
                                            <div class="box">
                                                <label for="Name"
                                                class="mr-sm-2" style="{{ $style }}">المرحلة</label>
                                                <select class="form-control" name="Grade_id" required style="text-align: center;padding:10px;font-size:18px">
                                                    @foreach ($grades as $Grade)
                                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="Name"class="mr-sm-2"><br></label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="حذف" style="{{ $style }}margin-top:10px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="اضافة صف اخر" style="font-size:18px;margin-bottom: 10px" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal" style="{{ $style }}">اغلاق</button>
                                <button type="submit"
                                    class="btn btn-success" style="{{ $style }}">اضافة</button>
                            </div>
                        </div>
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

@toastr_js
@toastr_render
<script>
    getPagination('#table-id');
    $('#maxRows').trigger('change');

    function getPagination(table) {

        $('#maxRows').on('change', function() {
            $('.pagination').html(''); // reset pagination div
            var trnum = 0; // reset tr counter
            var maxRows = parseInt($(this).val()); // get Max Rows from select option

            var totalRows = $(table + ' tbody tr').length; // numbers of rows
            $(table + ' tr:gt(0)').each(function() { // each TR in  table and not the header
                trnum++; // Start Counter
                if (trnum > maxRows) { // if tr number gt maxRows

                    $(this).hide(); // fade it out
                }
                if (trnum <= maxRows) {
                    $(this).show();
                } // else fade in Important in case if it ..
            }); //  was fade out to fade it in
            if (totalRows > maxRows) { // if tr total rows gt max rows option
                var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
                //	numbers of pages
                for (var i = 1; i <= pagenum;) { // for each page append pagination li
                    $('.pagination').append('<li data-page="' + i + '">\
								      <span>' + i++ + '<span class="sr-only">(current)</span></span>\
								    </li>').show();
                } // end for i


            } // end if row count > max rows
            $('.pagination li:first-child').addClass('active'); // add active class to the first li


            //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT
            showig_rows_count(maxRows, 1, totalRows);
            //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT

            $('.pagination li').on('click', function(e) { // on click each page
                e.preventDefault();
                var pageNum = $(this).attr('data-page'); // get it's number
                var trIndex = 0; // reset tr counter
                $('.pagination li').removeClass('active'); // remove active class from all li
                $(this).addClass('active'); // add active class to the clicked


                //SHOWING ROWS NUMBER OUT OF TOTAL
                showig_rows_count(maxRows, pageNum, totalRows);
                //SHOWING ROWS NUMBER OUT OF TOTAL



                $(table + ' tr:gt(0)').each(function() { // each tr in table not the header
                    trIndex++; // tr index counter
                    // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                    if (trIndex > (maxRows * pageNum) || trIndex <= ((maxRows * pageNum) -
                            maxRows)) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    } //else fade in
                }); // end of for each tr in table
            }); // end of on click pagination list
        });
        // end of on select change

        // END OF PAGINATION

    }




    // SI SETTING
    $(function() {
        // Just to append id number for each row
        default_index();

    });

    //ROWS SHOWING FUNCTION
    function showig_rows_count(maxRows, pageNum, totalRows) {
        //Default rows showing
        var end_index = maxRows * pageNum;
        var start_index = ((maxRows * pageNum) - maxRows) + parseFloat(1);
        var string = 'Showing ' + start_index + ' to ' + end_index + ' of ' + totalRows + ' entries';
        $('.rows_count').html(string);
    }

    // CREATING INDEX
    function default_index() {
        $('table tr:eq(0)').prepend('<th> ID </th>')

        var id = 0;

        $('table tr:gt(0)').each(function() {
            id++
            $(this).prepend('<td>' + id + '</td>');
        });
    }

    // All Table search script
    function FilterkeyWord_all_table() {

        // Count td if you want to search on all table instead of specific column

        var count = $('.table').children('tbody').children('tr:first-child').children('td').length;

        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("search_input_all");
        var input_value = document.getElementById("search_input_all").value;
        filter = input.value.toLowerCase();
        if (input_value != '') {
            table = document.getElementById("table-id");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 1; i < tr.length; i++) {

                var flag = 0;

                for (j = 0; j < count; j++) {
                    td = tr[i].getElementsByTagName("td")[j];
                    if (td) {

                        var td_text = td.innerHTML;
                        if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
                            //var td_text = td.innerHTML;
                            //td.innerHTML = 'shaban';
                            flag = 1;
                        } else {
                            //DO NOTHING
                        }
                    }
                }
                if (flag == 1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        } else {
            //RESET TABLE
            $('#maxRows').trigger('change');
        }
    }
</script>
@endsection
