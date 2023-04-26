<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>index nayf</h1>
    {{-- <h2>title: {{ $title }}</h2> --}}
    @foreach ($myphone as $item)
        <h3>{{ $item }}</h3>
    @endforeach
    {{-- <a href="{{ route('products') }} "">link to produc</a> --}}
</body>
</html> 