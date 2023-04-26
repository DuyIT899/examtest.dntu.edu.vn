<nav class="navbar navbar-light">
  <div class="container-fluid">
    <div class="d-flex align-items-center">
    <a class="navbar-brand">
      <img src="{{ asset('media/logoMN.png') }}"
      style="width:30px" 
    />
    </a>
    <p class="fw-bold text-white" style="text-transform: uppercase;
     margin-bottom:0px !important;
     font-size:18px;
     margin-left:20px ;
     ">
      Số lần bạn đã làm đề {{ $topic }}:
      <span style="color: yellow ; font-size:25px"> {{ $count }}</span><br />
      <span class="d-flex justify-content-center mt-1 align-items-baseline">Điểm cao nhất đạt được: 
      <span style="color: yellow ; font-size:25px">  {{ round($maxScore, 2) }}/10</span>
      </span>
    </p>
    </div>
      <form class="d-flex" method="post" action="{{ url('postLogout') }}">
        @csrf
          <input class="btn btn-danger" type="submit" value="Thoát">
    </form>
  </div>
</nav>