<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('src/css/main.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
@yield('content')
<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
