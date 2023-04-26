@extends('layouts.app')
@section('content')
    <h1>Đây là trang chủ</h1>
    <img src="{{ asset('storage/chuky.jpg') }} " 
    width="300px"
    />
    <h3>value là: {{ $value }} </h3>
@endsection
