<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="contaner">
        <div>
            <h2>Đây là trang Admin</h2>
            <form class="d-flex" method="post" action="postSearch">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            @if($name)
                <table class="table table-bordered">
                    <h2>Họ Tên Sinh Viên: {{ $name->FullName }}</h2>
                    <h4>Số Lần Thi: {{ $user->count() }} </h4>
                    <h4>Điểm Cao Nhất:{{ $user->max('Diem') }} </h4>
                    <h4>Điểm Thấp Nhất:{{ $user->min('Diem') }} </h4>
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th> Diem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td> {{ $item->UserId }}</td>
                                <td>{{ $item->Diem }}</td>
                            </tr>
                        @endforeach
                    </tbody>
    
                </table>
            @else 
            <h2>không có sinh viên</h2>
            @endif

        </div>
    </div>

</body>

</html>
