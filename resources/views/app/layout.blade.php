<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        @yield('title')
        @if(View::hasSection('title'))|@endif
        {{ config('app.name', 'Jasmine') }}
    </title>


    {{-- Custom styles for this template--}}
    <link href="{{ asset(mix('/css/app.css','jasmine-assets/app')) }}" rel="stylesheet">
    <script src="{{ asset(mix('/js/app.js','jasmine-assets/app')) }}" defer></script>
</head>

<body id="page-top">

{{-- Page Wrapper --}}
<div id="wrapper">

    @include('jasmine::app.partials.sidebar')

    {{-- Content Wrapper --}}
    <div id="content-wrapper" class="d-flex flex-column">
        {{-- Main Content --}}
        <div id="content">

            @include('jasmine::app.partials.topbar')

            {{-- Begin Page Content --}}
            <div class="container-fluid">

            </div>
            {{-- /.container-fluid --}}

        </div>
        {{-- End of Main Content --}}

        @include('jasmine::app.partials.footer')
    </div>
    {{-- End of Content Wrapper --}}
</div>
{{-- End of Page Wrapper --}}

{{-- Scroll to Top Button--}}
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

</body>

</html>