<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHẦN MỀM THI THỬ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta content="Đăng nhập" name="description">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    body {
        background-image: radial-gradient(circle at center, #66cdf3, #1f467f);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }

    .ima {
        position: relative;
    }

    .over-ima {
        position: absolute;
        z-index: -1;
        width: 350px;
        right: 300;
    }
</style>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex align-items-center h-100">
                <div class="col-md-5 col-lg-6 col-xl-5">
                    <img src="{{ asset('media/ima1.png') }}" width="500px" />
                </div>
                <div class="col-md-10 col-lg-7 col-xl-4 offset-xl-1 ima" style="width:700px">
                    <form method="post" action="{{ url('postLogin') }}">
                        @csrf
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="fw-bold text-white fs-3" style="margin-bottom: 0px"><span
                                    class="d-flex justify-content-center">CHÀO MỪNG<br></span>ĐẾN VỚI CHƯƠNG TRÌNH ÔN
                                TẬP LÝ THUYẾT</p>
                        </div>

                        <div class=" d-flex align-items-center justify-content-center mb-5">
                            <p class="text-center fw-bold fs-1"
                                style="-webkit-text-stroke: 2px #ffffff;
                            text-stroke: 2px #ffffff;
                            color:#254b81;
                            ">
                                CHUẨN ĐẦU RA TIN HỌC DNTU</p>
                        </div>
                        <div class="d-flex">
                            <!-- Email input -->
                            <div>
                                <div class="d-flex align-items-center justify-content-start pb-4 ms-5">
                                    <label class="form-label text-white px-4" for="form3Example3">Tài Khoản:</label>
                                    <input style="border-radius: 35px 35px 35px 35px; width:300px ;font-size:12px"
                                         id="form3Example3" class="form-control form-control-lg"
                                        name='username' />

                                </div>

                                <div class="d-flex align-items-center justify-content-start ms-5">
                                    <label class="form-label text-white px-4" for="form3Example4">Mật Khẩu:</label>
                                    <input style="border-radius: 35px 35px 35px 35px; width:70%; font-size:12px"
                                        type="password" id="form3Example4" class="form-control form-control-lg"
                                        name="password" />

                                </div>
                            </div>
                            <input type='submit' id='login' style="display: none" />
                            <label for='login' style="cursor: pointer">
                                <img src="{{ asset('media/dangnhap.png') }}" width="150px" />
                            </label>
                        </div>

                        <div class="d-flex justify-content-end align-items-center me-5 pe-3 mt-3">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value=""
                                    id="form2Example3" checked/>
                                <label class="form-check-label text-white" for="form2Example3">
                                    Lưu Đăng Nhập
                                </label>
                            </div>
                        </div>

                    </form>
                </div>
                <img class="over-ima" src="{{ asset('media/logoDN.png') }}" />
            </div>
        </div>

    </section>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

</html>
