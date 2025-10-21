@extends('layouts.main_layout')

@section('title')
    تعديل دورة تدريبية
@endsection
@section('css')
@endsection

@section('activePage')
    تعديل دورة تدريبية
@endsection

@section('activePageURL')
    <a href="{{ route('training_courses.index') }}">دورة تدريبية</a>
@endsection

@section('contentPage')
    تعديل دورة تدريبية
@endsection


@section('content')
    <div class="col-md-12">

        {{-- كود اضهار رسالة الاشعار --}}
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
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
            </table>

        </div>




    </div>
@endsection


@section('scripts')
@endsection
