@extends('layouts.main_layout')

@section('title')
    اضافة طالب للدورة التدريبية
@endsection
@section('css')
@endsection

@section('activePage')
    اضافة طالب للدورة التدريبية
@endsection

@section('activePageURL')
    <a href="{{ route('training_courses.index') }}">دورة تدريبية</a>
@endsection

@section('contentPage')
    اضافة طالب للدورة التدريبية
@endsection


@section('content')
    <div class="col-md-12">

        {{-- كود اضهار رسالة الاشعار --}}
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif


        <form role="form" style="width:80%; margin: 0 auto;background-color: white" method="POST"
            action="{{ route('training_courses.DoAddStudentToTrainingCourses',$data['id']) }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">بيانات الطالب</label>
                    <select name="studentID" id="studentID" class="form-control">
                        <option value="">اختر الطالب</option>
                        @if(!@empty($student))
                            @foreach ($student as $info)
                            <option value="{{ $info->id }}" @if(old('studentID'==$info->id)) selected @endif>{{ $info->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('studentID')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>



                  <div class="form-group">
                    <label for="enrolments_date">تاريخ التسجيل</label>
                    <input type="date"  class="form-control" id="enrolments_date" name="enrolments_date"
                        value="{{ old('enrolments_date') }}">

                </div>



                <div class="form-group" style="text-align: center">
                    <button type="submit" class="btn btn-primary">اضافة</button>

                        <a href="{{ route('training_courses.detalis', $data['id']) }}"
                                            class="btn btn-sm btn-info">الغاء</a>

                </div>
            </div>


        </form>

    </div>
@endsection


@section('scripts')
@endsection
