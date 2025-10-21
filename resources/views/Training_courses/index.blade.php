@extends('layouts.main_layout')

@section('title')
    الدورات التدريبية
@endsection
@section('css')
@endsection

@section('activePage')
    الدورات التدريبية
@endsection

@section('activePageURL')
    <a href="{{ route('training_courses.index') }}">الدورات التدريبية</a>
@endsection

@section('contentPage')
    عرض
@endsection


@section('content')
    <div class="col-12" style="padding: 15px; background-color: white;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center; float: none;">الدورات التدريبية
                    <a class="btn btn-sm btn-success" href="{{ route('training_courses.create') }}">اضافة</a>
                </h3>
                {{-- كود اضهار رسالة الاشعار --}}
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                {{-- كود اضهار رسالة الاشعار --}}
                @if (Session::has('error'))
                    <div class="alert alert-error" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">

                @if (isset($data) and !@empty($data) and count($data) > 0)
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 25%">اسم الدورة</th>
                                <th>السعر</th>
                                <th>تاريخ البداية </th>
                                <th>تاريخ الانتهاء </th>
                                <th>ملاحظات </th>
                                <th>الاضافة </th>
                                <th>التحديث </th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>{{ $info->couser_name }}</td>
                                    <td>{{ $info->price*1 }}</td>
                                    <td>{{ $info->start_date  }}</td>
                                    <td>{{ $info->end_date   }}</td>
                                    <td>{{ $info->notes   }}</td>
                                    <td>{{ $info->created_at }}</td>
                                    <td>{{ $info->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('training_courses.detalis', $info->id) }}"
                                            class="btn btn-sm btn-info">تفاصيل الدورة</a>
                                            <a href="{{ route('training_courses.edit', $info->id) }}"
                                            class="btn btn-sm btn-success">تعديل</a>
                                        <a href="{{ route('training_courses.destroy', $info->id) }}"
                                            class="btn btn-sm btn-danger">حذف</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p style="text-align: center;color: brown;margin-top: 10px">عفواً لا توجد بيانات لعرضها</p>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection


@section('scripts')
@endsection
