<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset(mix('css/app.css', 'jasmine-assets/auth')) }}">

    <script src="{{ asset(mix('js/app.js', 'jasmine-assets/auth')) }}" defer></script>
</head>

<body>
<main class="d-flex justify-content-center align-items-center h-100">
    <div class="box">
        <div class="brand">
            <img src="https://placehold.it/90" alt="brand">
        </div>
        @yield('content')
    </div>
</main>
</body>
</html>