@extends('backend.menus.superior')

@section('content-admin-css')
    <link href="{{ asset('css/adminlte.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/toastr.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/buttons_estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-workers shadow rounded">
                <div class="card-body">
                    <h2 class="card-title text-center text-gradient font-weight-bold mb-4"><i class="fas fa-cogs"></i> Web Worker Demo</h2>
                    <p class="text-center mb-4 text-gradient">Genera y ordena 100,000 números aleatorios sin bloquear la interfaz.</p>
                    <div class="d-flex justify-content-center mb-3">
                        <button id="generar" class="btn btn-workers btn-lg"><i class="fas fa-bolt"></i> Generar y Ordenar</button>
                    </div>
                    <div id="resultado" class="alert alert-info text-break" style="min-height: 60px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('archivos-js')
<script>
let worker;
document.getElementById('generar').addEventListener('click', function() {
    try {
        if (worker) worker.terminate();
        worker = new Worker('/js/ordenarWorker.js');
        const numeros = Array.from({length: 100000}, () => Math.floor(Math.random() * 1000000));
        worker.postMessage(numeros);
        document.getElementById('resultado').innerHTML = '<span class="spinner-border spinner-border-sm"></span> Calculando...';
        worker.onmessage = function(e) {
            try {
                const ordenados = e.data;
                const primeros50 = ordenados.slice(0, 50);
                document.getElementById('resultado').innerHTML = '<b>Primeros 50 números ordenados:</b><br>' + primeros50.join(', ');
            } catch (err) {
                document.getElementById('resultado').innerHTML = 'Error al mostrar el resultado: ' + err.message;
            }
        };
        worker.onerror = function(err) {
            document.getElementById('resultado').innerHTML = 'Error en el worker: ' + err.message;
        };
    } catch (err) {
        document.getElementById('resultado').innerHTML = 'Error al iniciar el worker: ' + err.message;
    }
});
</script>
@stop 