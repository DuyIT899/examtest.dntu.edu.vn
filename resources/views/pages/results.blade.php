@extends('layouts.app')
@section('content')
    
    <div class="container">
        <form method="get" action="{{ url('postReWork') }}">
            @csrf
            <input class="btn btn-primary " type="submit" value="làm lại">
              <h2 class=" mt-5 mb-5 text-center fw-bold fs-1 text-white" style="text-shadow: 4px 4px 7px #000000;">
                SỐ ĐIỂM CỦA BẠN: {{ round($diem,2) }}</h2>
          </form>
          <h2 class=" mt-5 mb-5 text-center fw-bold fs-1 text-white" style="text-shadow: 4px 4px 7px #000000;">CÂU SAI</h2>
          @forEach($wrongQ as $key => $value)
          <div class="fs-2 bg-white pt-4 pb-4 fw-bold mb-2" style="padding-left:20px; border-radius:35px; box-shadow: 7px 10px 5px rgba(0, 0, 0, 0.2);">
            {!! $value->cauhoi !!}
        </div>
          @endforeach
          
    </div>
@endsection
