@extends('layouts.main_layout')

@section('title')
    تعديل كورس
@endsection
@section('css')
@endsection

@section('activePage')
    تعديل كورس
@endsection

@section('activePageURL')
    <a href="{{ route('courses.index') }}">الكورسات</a>
@endsection

@section('contentPage')
    تعديل كورس
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
            action="{{ route('courses.update',$data->id) }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">اسم الكورس</label>
                    <input type="text" autofocus class="form-control" id="name" name="name"
                        value="{{ old('name',$data['name']) }}" placeholder="ادخل اسم الكورس">
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>حالة التفعيل</label>
                    <select name="active" id="active" class="form-control">
                        <option value="">اختر الحالة</option>
                        <option value="1" @if (old('active',$data['active']) == 1) selected @endif>مفعل</option>
                        <option value="0" @if (old('active',$data['active']) == 0 and old('active',$data['active']) != '') selected @endif>غير مفعل</option>
                    </select>
                    @error('active')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" style="text-align: center">
                    <button type="submit" class="btn btn-primary">تعديل</button>
                </div>
            </div>


        </form>

    </div>
@endsection


@section('scripts')
@endsection
