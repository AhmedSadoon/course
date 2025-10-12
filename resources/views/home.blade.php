@extends('layouts.main_layout')

@section('title')
الرئيسية
@endsection
@section('css')

@endsection

@section('activePage')
الرئيسية
@endsection

@section('activePageURL')
<a href="{{ route('home') }}">الرئيسية</a>
@endsection

@section('contentPage')
عرض
@endsection


@section('content')
<div style="background-size: cover;width: 500px;height: 50%; background-image: url{{ asset('admin/images/layout.jpg') }}"></div>
@endsection


@section('scripts')

@endsection
