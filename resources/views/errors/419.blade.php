<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Página no encontrada</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
<div id="notfound">
    <div class="notfound-bg"></div>
    <div class="notfound">
        <div class="notfound-404">
            <h1>419</h1>
        </div>
        <h2 style="font-family: 'Arial Black'">Su Sesión Expiro. Por favor iniciar sesión nuevamente!</h2>
        <button type="button" onclick="redireccionar()" class="btn btn-primary btn-sm">
            INICIAR SESIÓN
        </button>
    </div>
</div>
</body>
</html>

<script>

    function redireccionar(){
        window.location.href="{{ url('/') }}";
    }

</script>
