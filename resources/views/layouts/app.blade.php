<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <title>Moodhouse | Change your mood with us!</title>
</head>
<style>
    #canvas1 {
        position: absolute;
        height: 100%;
        top: 0;
        filter: blur(16px);
        background-color: #080f24;
        width: 100%;
        z-index: -1;
    }

</style>

<body>

    @yield('content')
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('app.js') }}"></script>
</body>

</html>
