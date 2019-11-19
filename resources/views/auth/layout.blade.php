<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>My Login Page</title>

    <link rel="stylesheet" href="{{ asset(mix('css/app.css', 'jasmine-assets/auth')) }}">
</head>

<body class="my-login-page">

@yield('content')

<script src="{{ asset(mix('js/app.js', 'jasmine-assets/auth')) }}"></script>
</body>
</html>