@extends('layouts.main_layout')

@section('title')
    الطلاب
@endsection
@section('css')
@endsection

@section('activePage')
    الطلاب
@endsection

@section('activePageURL')
    <a href="{{ route('courses.index') }}">بيانات الطلاب</a>
@endsection

@section('contentPage')
    عرض
@endsection


@section('content')
    <div class="col-12" style="padding: 15px; background-color: white;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center; float: none;">بيانات الطلاب
                    <a class="btn btn-sm btn-success" href="{{ route('student.create') }}">اضافة</a>
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
                                <th>اسم الطالب</th>
                                <th>الهاتف </th>
                                <th>العنوان </th>
                                <th>الصورة </th>
                                <th>رقم الوهوية </th>
                                <th>ملاحظات </th>
                                <th>التفعيل </th>
                                <th>الاضافة </th>
                                <th>التحديث </th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->phone }}</td>
                                    <td>{{ $info->address }}</td>
                                    <td><img src="{{ asset('uploads/'.$info->image) }}" style="width: 70px;height: 70px; "></td>
                                    <td>{{ $info->nationalID }}</td>
                                    <td>{{ $info->notes }}</td>
                                    <td>
                                        @if ($info->active == 1)
                                            مفعل
                                        @else
                                            غير مفعل
                                        @endif
                                    </td>

                                    <td>{{ $info->created_at }}</td>
                                    <td>{{ $info->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('student.edit', $info->id) }}"
                                            class="btn btn-sm btn-success">تعديل</a>
                                        <a href="{{ route('student.destroy', $info->id) }}"
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
