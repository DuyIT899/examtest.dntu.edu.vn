@extends('layouts.app2')
@section('content')
    {{-- @php
        $time = explode(':', $timeDo);
    @endphp --}}

    <body>
        <div class="container">
            <div class="row">
                {{-- <h4 class="text-right time">{{ $timeDo }}</h4> --}}
                {{-- <div class="col-md-12">
                <div class="card-header">
                    {{ $listQuestion->links('pagination::bootstrap-5') }}
                </div>
                <div class="card-body">
                    <div>
                        @foreach ($listQuestion as $masterKey => $item)
                            <h2>Câu hỏi:{{ $item->CauHoi }}</h2>
                    </div>
                </div>

                <div>
                    <h4> Đáp Án:</h4>
                    <form method="post" action="{{ url('results') }}">
                        @csrf
                        @foreach ($listAnswer as $key => $value)
                            @if ($item->IdCauHoi == $value->idCauHoi)
                                <div class="d-flex">
                                    <div class=".bg-light mb-3"
                                        style="cursor:pointer;
                                height:35px;
                                font-size:20px;
                                ">
                                        <input class="form-check-input" type="radio" style="width:20px"
                                            value="{{ $value->isTrue }}" name="tFA{{ $masterKey }}[]"
                                            id="flexCheckChecked{{ $key }}">
                                        <label style="cursor:pointer" class="form-check-label"
                                            for="flexCheckChecked{{ $key }}">
                                            {{ $value->DapAn }}
                                        </label>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div>
                        </div>
                        <a href="{{ route('editQuestion', ['id' => $item->IdCauHoi]) }}"class="btn btn-secondary btn-sm ml-3"><i
                            class="fas fa-tools"></i> Sửa
                    </a>
                </div>
                @endforeach
                <input class="btn btn-success" type="submit" value="Submit">
                </form>
            </div> --}}
                <div>
                    <h2 class="text-white fs-1 ">Câu hỏi:</h2>
                </div>
                <div class="fs-2 bg-white pt-4 pb-4 fw-bold mb-2" style="border-radius:35px; box-shadow: 7px 10px 5px rgba(0, 0, 0, 0.2);">
                    {!! $listQuestion->CauHoi !!}
                </div>
                <div class="col-md-12">
                </div>
                <div class="card-body">
                </div>
                <div>
                    <form method="post" action="{{ url('postCheck') }}">
                        @csrf
                        @foreach ($listAnswer as $key => $value)
                            @if ($listQuestion->IdCauHoi == $value->idCauHoi)
                                    <div class=".bg-light mb-3 d-flex align-items-center justify-content-start"
                                        style="cursor:pointer;
                                                height:35px;
                                                padding-bottom:50px;">
                                        <input class="form-check-input fs-2" type="radio" style="; color:red"
                                            value="{{ $value->idDapAn }}" name="tFA[]"
                                            id="flexCheckChecked{{ $key }}"
                                            {{ $checkAgain == $value->idDapAn ? 'checked' : '' }}>
                                        <label style="cursor:pointer; padding-left:15px" class="form-check-label fw-bold fs-4 text-white "
                                            for="flexCheckChecked{{ $key }}">
                                            {!! $value->DapAn !!}
                                        </label>
                                    </div>
                            @endif
                        @endforeach
                        <div>
                        </div>

                        @if ($previous)
                            <a href="{{ route('exam', $previous) }}"class="btn btn-danger btn-sm ml-3"
                                style="width:35px; height:39px">
                                <i class="fas fa-chevron-left" style="font-size:25px"></i> </a>
                        @endif
                        @if ($next)
                            <input id="next" class="btn btn-danger" type="submit" value=">" style="display: none">
                            <label for='next' class="btn btn-danger">
                                <i class="fas fa-chevron-right" style="font-size:21px"></i>
                            </label>
                        @endif
                        @if (!$next)
                        <input id='res'  class="btn btn-success d-none" type="submit">
                            @endif
                    </form>
                </div>
                    <label style="cursor: pointer"for='res' class="d-flex mt-4">
                    <img src="{{ asset('media/res.png') }}" width="200px" />
                    </label>
                <form method="get" action={{ route('results') }}>
                    @csrf
                    <input id='res'  class="btn btn-success d-none" type="submit">
                </form>

            </div>
            @foreach ($test as $key => $item) 

                @if (!in_array($item->sttCauHoi, $tempArray) and $item->IsCheck == 1 or $item->IsCheck == null) 
                   <?php array_push($tempArray, $item->sttCauHoi); ?>
                   <a href={{ $item->IdCauHoi }}
                   style="width:100px;
                   {{ $item->IsCheck == 1 
                   ? 'background-image: linear-gradient(to top, #e6e600, #ffffcc);color:black!important;'
                   : 'background-image: linear-gradient(to top, #677987, #2d4351)'}};
                   box-shadow: 0px 2px 4px rgba(255, 255, 255, 0.4);
                   color:white;
                   margin-left:10px;
                   margin-top:10px"
                   class="btn fs-5">{{$item->sttCauHoi}}</a>
                @endif
                
            @endforeach

        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        {{-- <script>
            $(document).ready(function() {


                var time = @json($time);
                $('.time').text(time[1] + ':00')
                var seconds = 0;
                var hours = time[0];
                var minutes = time[1];

                setInterval(() => {
                    if (seconds <= 0) {
                        minutes--;
                        seconds = 59;
                    }
                    if (minutes <= 0) {
                        alert('hết giờ rồi');
                        window.location.href = "exam";
                    }
                    $('.time').text(minutes + ':' + seconds + '')
                    seconds--;
                }, 1000);

            });
        </script> --}}
        {{-- <script>
            let my = document.getElementById('checkAgain');
            let links = my.getElementsByTagName('a');

            Array.from(links).forEach(function(link) {
                if ({{ $checkAgain != null }}) {
                    link.classList.remove('btn-primary');
                    link.classList.add('btn-success');
                };
            })
        </script> --}}
    </body>
@endsection
