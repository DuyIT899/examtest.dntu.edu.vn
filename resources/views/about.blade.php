@extends('layouts.app')
@section('content')
    <h1>Đây là trang ờ bao</h1>
    {{-- unless = if !() --}}
    @unless (empty($name))
        <h3>name là: {{ $name }}</h3>
    @endunless
    @empty($age)
        <h3>méo có tuổi </h3>
    @endempty
    @isset($name)
        <h3>có tên nhá</h3>
    @endisset
    @switch($name)
        @case('duy')
            <h3>Hê lô anh Duy nhá hahah</h3>
            @break
        @case('Phương')
            <h3>Hê lô Phương nhá nhá</h3>
            @break
        @default
            <h3>Méo hê lô ai cả</h3>
    @endswitch
    @foreach ($names as $item)
        <h3> name laf: {{ $item }}</h3>   
    @endforeach
@endsection
