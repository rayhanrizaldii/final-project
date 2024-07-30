<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    @include('include.style')
</head>

<body>
    <script src="{{ asset('template/assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        @include('include.sidebar')
        <div id="main" class="layout-navbar navbar-fixed">
            @include('include.header')
            @yield('content')
            @include('include.footer')
        </div>
    </div>
    @include('include.script');
</body>

</html>
