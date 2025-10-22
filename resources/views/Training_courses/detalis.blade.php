@extends('layouts.main_layout')

@section('title')
    تفاصيل دورة تدريبية
@endsection
@section('css')
@endsection

@section('activePage')
    تفاصيل دورة تدريبية
@endsection

@section('activePageURL')
    <a href="{{ route('training_courses.index') }}">دورة تدريبية</a>
@endsection

@section('contentPage')
    تفاصيل دورة تدريبية
@endsection


@section('content')
    <div class="col-md-12">

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




        <div class="card-body" style="background-color: white">

            <table id="example2" class="table table-bordered table-hover">
                <tr>
                    <td>اسم الكورس</td>
                    <td>{{ $data['couser_name'] }}</td>
                </tr>

                <tr>
                    <td>السعر</td>
                    <td>{{ $data['price'] }}</td>
                </tr>

                <tr>
                    <td>تاريخ البداية</td>
                    <td>{{ $data['start_date'] }}</td>
                </tr>

                 <tr>
                    <td>تاريخ النهاية</td>
                    <td>{{ $data['end_date'] }}</td>
                </tr>

                <tr>
                    <td>ملاحظات</td>
                    <td>{{ $data['notes'] }}</td>
                </tr>

                 <tr>
                    <td>عدد الطلاب المسجلين في الدورة</td>
                    <td>{{ $data['studentCounter']*1}}</td>
                </tr>

                 <tr>

                    <td colspan="2">
                        <a href="{{ route('training_courses.AddStudentToTrainingCourses', $data['id']) }}"
                                            class="btn btn-sm btn-info">اضافة طالب</a>

                    </td>
                </tr>
            </table>

            @if (isset($training_courses_enrolments) and !@empty($training_courses_enrolments) and count($training_courses_enrolments) > 0)
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 25%">اسم الطالب</th>

                                <th>تاريخ التسجيل </th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($training_courses_enrolments as $info)
                                <tr>
                                    <td>{{ $info->student_name }}</td>
                                    <td>{{ $info->enrolments_date }}</td>

                                    <td>

                                        <a href="{{ route('training_courses.deleteStudentFromTrainingCourses', $info->id) }}"
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




    </div>
@endsection


@section('scripts')
@endsection
