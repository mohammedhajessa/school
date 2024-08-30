@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
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
    Grade
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Grade
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    @if ($errors->any())
        <div class="error">{{ $errors->first('Name') }}</div>
    @endif
    <!-- Left Sidebar End-->

    <!--=================================
 Main content -->

    <!--=================================
wrapper -->
@php
    $style = "font-size:20px;font-family: Times, serif"
@endphp

    <div class="content-wrapper">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">Data HTML Table </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Data HTML Table </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- main body -->
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
                        <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal" style="{{ $style }}">
                            اضافة مرحلة
                        </button>
                        <br><br>
                        <div class="table-responsive">
                            <div class="container">
                                <div class="header_wrap">
                                    <div class="num_rows">

                                        <div class="form-group">
                                            <select class  ="form-control" name="state" id="maxRows"style="text-align: center;padding:10px;border-radius:10px;margin-top:10px">
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
                                            placeholder="بحث.." class="form-control"  style="font-size:18px;border-radius:10px;margin-bottom:20px">
                                    </div>
                                </div>
                                <table class="table table-striped table-class" id= "table-id">


                                    <thead>
                                        <tr style="{{ $style }}" >
                                            <th>الاسم</th>
                                            <th>الملاحظات</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($grades as $grade)
                                            <tr style="{{ $style }}">
                                                {{-- <td>{{ $i++ }}</td> --}}
                                                <td>{{ $grade->Name }}</td>
                                                <td>{{ $grade->Nots }}</td>
                                                <td> <button type="button" class="btn btn-info btn-sm"
                                                        data-toggle="modal" data-target="#edit{{ $grade->id }}"
                                                        title="edit"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal" data-target="#delete{{ $grade->id }}"
                                                        title="delete"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                                <!-- edit_modal_Grade -->
                                        <div  class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif ;font-size:30px" class="modal-title"
                                                        id="exampleModalLabel">
                                                        تعديل
                                                    </h5>
                                                    <button  type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close" style="{{ $style }}">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form action="{{ route('grades.update') }}" method="post">
                                                        {{method_field('patch')}}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="Name"
                                                                        class="mr-sm-2" style="{{ $style }}">اسم المرحلة بالعربية
                                                                    :</label>
                                                                <input id="Name" type="text" name="Name"
                                                                            class="form-control"
                                                                            value="{{$grade->Name}}"
                                                                            required style="{{ $style }}">
                                                                <input id="id" type="hidden" name="id" class="form-control"
                                                                        value="{{ $grade->id }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleFormControlTextarea1" style="{{ $style }}">ملاحظات
                                                                :</label>
                                                            <textarea class="form-control" name="Notes"
                                                                        id="exampleFormControlTextarea1"
                                                                        rows="3" style="font-size:20px;font-family: Times, serif">{{ $grade->Nots }}</textarea>
                                                        </div>
                                                        <br><br>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal" style="{{ $style }}">اغلاق</button>
                                                            <button type="submit"
                                                                    class="btn btn-success" style="{{ $style }}">تعديل</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- delete_modal_Grade -->
                                        <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="{{ $style }}" class="modal-title"
                                                        id="exampleModalLabel">
                                                        حذف مرحلة
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('grades.delete') }}" method="post">
                                                        {{method_field('Delete')}}
                                                        @csrf
                                                        <h1 style="{{ $style }}">سيتم حذف البيانات نهائيا.</h1>
                                                        <input id="Name" type="text" name="Name"
                                                                            class="form-control"
                                                                            value="{{$grade->Name}}"
                                                                            disabled style="{{ $style }}">
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $grade->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal" style="{{ $style }}">اغلاق</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger" style="{{ $style }}">حذف</button>
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
            <!-- add_modal_Grade -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="{{ $style }}" class="modal-title" id="exampleModalLabel">
                                اضافة مرحلة دراسية
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- add_form -->
                            <form action="{{ route('grades.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2" style="{{ $style }}">اسم المرحلة بالعربية
                                            :</label>
                                        <input id="Name" type="text" name="Name" class="form-control" style="{{ $style }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" style="{{ $style }}">ملاحظات
                                        :</label>
                                    <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3" style="{{ $style }}"></textarea>
                                </div>
                                <br><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  style="{{ $style }}">اغلاق</button>
                            <button type="submit" class="btn btn-success" style="{{ $style }}">ادخال</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!--=================================
 wrapper -->

        <!--=================================
 footer -->

        <footer class="bg-white p-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-center text-md-left">
                        <p class="mb-0"> &copy; Copyright <span id="copyright">
                                <script>
                                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                </script>
                            </span>. <a href="#"> Webmin </a> All Rights Reserved. </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="text-center text-md-right">
                        <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
                        <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
                        <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
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
