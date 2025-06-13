<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>APIs</title>
    <link rel="stylesheet" href="{{ asset('css/apis/apis.css') }}">
    @yield('head')
</head>
<body>
    <div class="content">
        @yield('content')
    </div>

    @yield('scripts')
</body>
<script src="{{ asset('js/apis/apis.js') }}"></script>

</html>
