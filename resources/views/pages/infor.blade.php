@extends('layouts.app2')
@section('content')
    <div class="container">
        <div class="row">
        </div>
        <form class="d-flex justify-content-center align-items-center flex-column" style="min-height: 86vh" method="get"
            action="{{ route('exam', ['id' => $idCauHoi]) }}">
            @csrf
            <input
            id='start'
                style="background: linear-gradient(to top, #01d3df, #0a4372, #afb2c1);
            display:none;
            font-size:70px;
            color:#fff;
            border: 10px solid transparent;
            border-image: radial-gradient(circle at center, #5c5761, #e3dfe4) 1;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            border-radius:50px;
            "
                class="btn" type="submit" value="BẮT ĐẦU">
                <label style="cursor: pointer; margin-bottom:30px" for='start'>
                <img src="{{ asset('media/start.png') }}" width="400px" />
                </label>
                <p class="text-white fs-2 fst-italic">Lưu ý: bạn phải vượt qua 70% bài ôn,<br>mới có thể tiếp tục thực hiện bài tiếp theo </p>
        </form>
    </div>
@endsection
