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
     ">
      CHÀO MỪNG BẠN {{ $name }}<br /><span class="d-flex justify-content-center"> chúc bạn ôn tập thật tốt</span>
    </p>
    </div>
      <form class="d-flex" method="post" action="{{ url('postLogout') }}">
        @csrf
          <input class="btn btn-danger" type="submit" value="Thoát">
    </form>
  </div>
</nav>