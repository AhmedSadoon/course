@extends('layouts.main_layout')

@section('title')
    تعديل طالب
@endsection
@section('css')
@endsection

@section('activePage')
    تعديل طالب
@endsection

@section('activePageURL')
    <a href="{{ route('courses.index') }}">الطلاب</a>
@endsection

@section('contentPage')
    تعديل طالب
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
            action="{{ route('student.update',$data['id']) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">اسم الطالب</label>
                    <input type="text" autofocus class="form-control" id="name" name="name"
                        value="{{ old('name',$data['name']) }}" placeholder="ادخل اسم الطالب">
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                 <div class="form-group">
                    <label for="phone">الهاتف</label>
                    <input type="text"  class="form-control" id="phone" name="phone"
                        value="{{ old('phone',$data['phone']) }}" placeholder="ادخل رقم الهاتف">
                    @error('phone')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="address">العنوان</label>
                    <input type="text"  class="form-control" id="address" name="address"
                        value="{{ old('address',$data['address']) }}" placeholder="ادخل العنوان">

                </div>

                 <div class="form-group">
                    <label for="image">الصورة</label> <br>
                    <img src="{{ asset('uploads/'.$data['image']) }}" alt="صورة الطالب" style="width: 150px;height: 150px; border-radius: 50%"><br><br>
                    <input type="file"  class="form-control" id="image" name="image"
                        value="{{ old('image') }}">

                </div>

                <div class="form-group">
                    <label for="nationalID">رقم الهوية</label>
                    <input type="text"  class="form-control" id="nationalID" name="nationalID"
                        value="{{ old('nationalID',$data['nationalID']) }}" placeholder="ادخل رقم الهوية">
                    @error('nationalID')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="notes">الملاحظات </label>
                    <input type="text"  class="form-control" id="notes" name="notes"
                        value="{{ old('notes',$data['notes']) }}" placeholder="ادخل الملاحظات">

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
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>


        </form>

    </div>
@endsection


@section('scripts')
@endsection
