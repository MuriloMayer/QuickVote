<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>QuickVote</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @stack('styles')

</head>
<body>
@section('nav')
    <nav>
        <div class="Title">
            <h1>QuickVote</h1>
        </div>
        <div class="button">
            <a href="{{ route('home') }}">Home</a>
        </div>
    </nav>
@show

@yield('content')

@stack('scripts')
</body>
</html>
