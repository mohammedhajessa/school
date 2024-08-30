@php
    $style = "font-size:17px;font-family: Times, serif"
@endphp
<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button" style="{{ $style }}">add parent</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
            style="text-align: center">
        <thead>
        <tr class="table-success" style="{{ $style }}">
            <th>#</th>
            <th>اسم الاب الكامل</th>
            <th>اسم الاب للأم</th>
            <th>اسم الجد</th>
            <th>رقم هاتف الأب</th>
            <th>رقم هاتف الأم</th>
            <th>رقم الهوية_الرقم_الوطني للأب</th>
            <th>الهوية_الرقم_الوطني للأم</th>
            <th>جنسية الأب</th>
            <th>جنسية الأم</th>
            <th>عمل الأب</th>>
            <th>زمرة دم الأم</th>
            <th>زمرة دم الأب</th>
            <th>الإيميل</th>
            <th>العمليات</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($my_parents as $my_parent)
            <tr style="{{ $style }}">
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $my_parent->Name_Father }}</td>
                <td>{{ $my_parent->Name_Mother }}</td>
                <td>{{ $my_parent->Name_Grand }}</td>
                <td>{{ $my_parent->National_ID_Father }}</td>
                <td>{{ $my_parent->National_ID_Mother }}</td>
                <td>{{ $my_parent->Phone_Father }}</td>
                <td>{{ $my_parent->Phone_Mother }}</td>
                <td>{{ $my_parent->Nationality_Mother }}</td>
                <td>{{ $my_parent->Nationality_Father }}</td>
                <td>{{ $my_parent->Job_Father }}</td>
                <td>{{ $my_parent->Blood_Type_Father }}</td>
                <td>{{ $my_parent->Blood_Type_Mother }}</td>
                <td>{{ $my_parent->Email }}</td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})" style="{{ $style }}" title="{{ trans('Grades_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})" title="{{ trans('Grades_trans.Delete') }}" style="{{ $style }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
