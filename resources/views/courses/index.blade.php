@extends('layouts.main_layout')

@section('title')
    الكورسات
@endsection
@section('css')
@endsection

@section('activePage')
    الكورسات
@endsection

@section('activePageURL')
    <a href="{{ route('courses.index') }}">الكورسات</a>
@endsection

@section('contentPage')
    عرض
@endsection


@section('content')
    <div class="col-12" style="padding: 15px; background-color: white;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center; float: none;">بيانات الكورسات
                    <a class="btn btn-sm btn-success" href="{{ route('courses.create') }}">اضافة</a>
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
                                <th>اسم الكورس</th>
                                <th>حالة التفعيل</th>
                                <th>تاريخ الاضافة</th>
                                <th>تاريخ التحديث</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>{{ $info->name }}</td>
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
                                        <a href="{{ route('courses.edit', $info->id) }}" class="button"
                                            style="background-color: #04AA60;padding: 10px;color: white">تعديل</a>
                                        <a href="{{ route('courses.destroy', $info->id) }}" class="button"
                                            style="background-color: #aa0704;padding: 10px; color: white">حذف</a>

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
