@extends('layouts.main_layout')

@section('title')
    اضافة كورس
@endsection
@section('css')
@endsection

@section('activePage')
    اضافة كورس
@endsection

@section('activePageURL')
    <a href="{{ route('courses.index') }}">الكورسات</a>
@endsection

@section('contentPage')
    اضافة كورس
@endsection


@section('content')
    <div class="col-md-12">

          {{-- كود اضهار رسالة الاشعار --}}
                @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>

                @endif


        <form role="form" style="width:80%; margin: 0 auto;background-color: white" method="POST" action="{{ route('courses.store') }}">
@csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">اسم الكورس</label>
                    <input type="text" autofocus class="form-control" id="name" name="name"
                        value="{{ old('name') }}" placeholder="ادخل اسم الكورس">
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>حالة التفعيل</label>
                    <select name="active" id="active" class="form-control">
                        <option value="">اختر الحالة</option>
                        <option value="1" @if(old('active')==1) selected @endif>مفعل</option>
                        <option value="0" @if(old('active')==0 and old('active')!='') selected @endif>غير مفعل</option>
                    </select>
                    @error('active')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
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
