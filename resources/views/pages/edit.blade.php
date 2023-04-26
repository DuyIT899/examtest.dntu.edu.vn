@extends('layouts.app')
@section('content')
    <h2 class=" mt-5 mb-5 text-center fw-bold fs-1 text-white" style="text-shadow: 4px 4px 7px #000000;">CHỌN HỌC PHẦN ÔN
        LUYỆN</h2>
    <form class="d-flex justify-content-around" method="get" action="{{ route('getValue') }}">
        <input class="btn btn-primary" id="TCB" type="submit" name='check1' value="1" style="display: none">
        <label style="cursor:pointer" class="form-check-label " for="TCB">
            <img src="{{ asset('media/tcb.png') }}" width="600px" />
        </label>

        <input class="btn btn-primary" id='TNC' type="submit" name='check1' value="2" style="display: none">
        <label style="cursor:pointer" class="form-check-label " for="TNC">
            <img src="{{ asset('media/tnc.png') }}" width="600px" />
        </label>

    </form>
    {{-- <div class="mt-4 text-center fw-bold text-white"style="text-shadow: 4px 4px 7px #000000;">
        @if ($idMon == 1)
            <h2>Bạn đang chọn tin cơ bản</h2>
        @else
            <h2>Bạn đang chọn tin nâng cao</h2>
        @endif
    </div>
    <form class="d-flex justify-content-center" method="get" action="{{ route('topic') }}">
        <input class="btn btn-success " type="submit" value="Chọn đề" />
    </form> --}}
@endsection
