@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if ($idMon == 1)
                <h2 class=" mt-5 mb-5 text-center fw-bold fs-1 text-white" style="text-shadow: 4px 4px 7px #000000;">CHỌN BÀI
                    ÔN TẬP UDCNTT CƠ BẢN</h2>
            @elseif($idMon == 2)
                <h2 class=" mt-5 mb-5 text-center fw-bold fs-1 text-white" style="text-shadow: 4px 4px 7px #000000;">CHỌN BÀI
                    ÔN TẬP UDCNTT NÂNG CAO</h2>
            @endif
            <form method="get" action="{{ route('getTopic') }}">
                @foreach ($boDe as $key => $item)
                    <input type="submit" class="btn fw-bold fs-3
                     " name='getTopic'
                        value=" {{ $item->boDe }}" 
                        style="width:100px;
                        background-image: linear-gradient(to top, #677987, #2d4351);
                        box-shadow: 0px 2px 4px rgba(255, 255, 255, 0.4);
                        color:white;
                        margin-left:65px;
                        margin-bottom:35px;
                        "/>
                @endforeach
            </form>
        </div>
    </div>
@endsection
