@extends('layouts.main_layout')

@section('title')
    اضافة دورة تدريبية
@endsection
@section('css')
@endsection

@section('activePage')
    اضافة دورة تدريبية
@endsection

@section('activePageURL')
    <a href="{{ route('training_courses.index') }}">دورة تدريبية</a>
@endsection

@section('contentPage')
    اضافة دورة تدريبية
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
            action="{{ route('training_courses.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">الدورة</label>
                    <select name="courseID" id="courseID" class="form-control">
                        <option value="">اختر الدورة</option>
                        @if(!@empty($courses))
                            @foreach ($courses as $info)
                            <option value="{{ $info->id }}" @if(old('courseID'==$info->id)) selected @endif>{{ $info->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('courseID')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                 <div class="form-group">
                    <label for="price">سعر الدورة</label>
                    <input type="text" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"  class="form-control" id="price" name="price"
                        value="{{ old('price') }}" placeholder="ادخل سعر الدورة">
                    @error('price')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="start_date">تاريخ بداية الدورة</label>
                    <input type="date"  class="form-control" id="start_date" name="start_date"
                        value="{{ old('start_date') }}">

                </div>

                 <div class="form-group">
                    <label for="end_date">تاريخ نهاية الدورة</label>
                    <input type="date"  class="form-control" id="end_date" name="end_date"
                        value="{{ old('end_date') }}">

                </div>



                <div class="form-group">
                    <label for="notes">الملاحظات </label>
                    <input type="text"  class="form-control" id="notes" name="notes"
                        value="{{ old('notes') }}" placeholder="ادخل الملاحظات">

                </div>

                <div class="form-group" style="text-align: center">
                    <button type="submit" class="btn btn-primary">اضافة</button>
                </div>
            </div>


        </form>

    </div>
@endsection


@section('scripts')
@endsection
