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
    <h2 class="mb-4 text-center text-gradient font-weight-bold">APIs Interactivas</h2>
    <div class="row justify-content-center">
        <!-- Geolocalización y Mapa -->
        <div class="col-md-10 col-lg-8 mb-4">
            <div class="card card-custom shadow rounded">
                <div class="card-body">
                    <h4 class="card-title text-gradient"><i class="fas fa-map-marker-alt"></i> Geolocalización</h4>
                    <div class="mb-2">
                        <span class="badge badge-custom">Latitud:</span> <span id="latitud">Obteniendo...</span>
                        <span class="ml-3 badge badge-custom">Longitud:</span> <span id="longitud">Obteniendo...</span>
                    </div>
                    <div id="map" class="mb-2 border-turquesa" style="height: 300px; border-radius: 10px; overflow: hidden;"></div>
                </div>
            </div>
        </div>
        <!-- Canvas de Dibujo -->
        <div class="col-md-5 mb-4">
            <div class="card card-custom shadow rounded h-100">
                <div class="card-body d-flex flex-column align-items-center">
                    <h4 class="card-title text-gradient"><i class="fas fa-pencil-alt"></i> Dibuja en el Canvas</h4>
                    <canvas id="canvasDibujo" width="400" height="300" class="mb-2 border-turquesa rounded bg-dark-canvas" style="max-width:100%;"></canvas>
                    <button id="guardarCanvas" class="btn btn-turquesa mt-2"><i class="fas fa-download"></i> Guardar como JPG</button>
                </div>
            </div>
        </div>
        <!-- Cámara Web -->
        <div class="col-md-5 mb-4">
            <div class="card card-custom shadow rounded h-100">
                <div class="card-body d-flex flex-column align-items-center">
                    <h4 class="card-title text-gradient"><i class="fas fa-camera"></i> Captura de Cámara Web</h4>
                    <video id="video" width="400" height="300" autoplay class="mb-2 border-turquesa rounded bg-dark-canvas" style="max-width:100%;"></video>
                    <div class="d-flex flex-column flex-md-row align-items-center w-100 justify-content-center">
                        <button id="tomarFoto" class="btn btn-success mr-md-2 mb-2 mb-md-0"><i class="fas fa-camera-retro"></i> Tomar Foto</button>
                        <a id="descargarFoto" style="display:none;" class="btn btn-turquesa" download="captura.jpg"><i class="fas fa-download"></i> Descargar Foto</a>
                    </div>
                    <canvas id="canvasFoto" width="400" height="300" style="display:none;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('archivos-js')
<!-- LeafletJS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    function mostrarPosicion(position) {
        try {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            document.getElementById('latitud').textContent = lat;
            document.getElementById('longitud').textContent = lng;

            // Inicializar el mapa
            var map = L.map('map').setView([lat, lng], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);
            L.marker([lat, lng]).addTo(map)
                .bindPopup('¡Estás aquí!').openPopup();
        } catch (error) {
            mostrarError(error);
        }
    }
    function mostrarError(error) {
        try {
            document.getElementById('latitud').textContent = 'No disponible';
            document.getElementById('longitud').textContent = 'No disponible';
            alert('No se pudo obtener la ubicación: ' + error.message);
        } catch (e) {
            alert('Error inesperado: ' + e.message);
        }
    }
    try {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(mostrarPosicion, mostrarError);
        } else {
            mostrarError({message: 'Geolocalización no soportada'});
        }
    } catch (error) {
        mostrarError(error);
    }

    // --- Dibujo en Canvas ---
    const canvas = document.getElementById('canvasDibujo');
    const ctx = canvas.getContext('2d');
    try {
        // Rellenar el fondo de blanco al cargar la página
        ctx.fillStyle = '#fff';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    } catch (error) {
        alert('Error al inicializar el canvas: ' + error.message);
    }
    let dibujando = false;
    let x = 0;
    let y = 0;

    canvas.addEventListener('mousedown', function(e) {
        try {
            dibujando = true;
            [x, y] = [e.offsetX, e.offsetY];
        } catch (error) {
            alert('Error al iniciar el dibujo: ' + error.message);
        }
    });
    canvas.addEventListener('mousemove', function(e) {
        try {
            if (dibujando) {
                ctx.beginPath();
                ctx.moveTo(x, y);
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.strokeStyle = '#000';
                ctx.lineWidth = 2;
                ctx.stroke();
                [x, y] = [e.offsetX, e.offsetY];
            }
        } catch (error) {
            alert('Error al dibujar: ' + error.message);
        }
    });
    canvas.addEventListener('mouseup', function(e) {
        try {
            dibujando = false;
        } catch (error) {
            alert('Error al finalizar el dibujo: ' + error.message);
        }
    });
    canvas.addEventListener('mouseleave', function(e) {
        try {
            dibujando = false;
        } catch (error) {
            alert('Error al salir del canvas: ' + error.message);
        }
    });

    document.getElementById('guardarCanvas').addEventListener('click', function() {
        try {
            const enlace = document.createElement('a');
            enlace.download = 'dibujo.jpg';
            enlace.href = canvas.toDataURL('image/jpeg');
            enlace.click();
        } catch (error) {
            alert('Error al guardar el dibujo: ' + error.message);
        }
    });

    // --- API de Video ---
    const video = document.getElementById('video');
    const canvasFoto = document.getElementById('canvasFoto');
    const btnTomarFoto = document.getElementById('tomarFoto');
    const enlaceDescarga = document.getElementById('descargarFoto');

    try {
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    try {
                        video.srcObject = stream;
                        video.play();
                    } catch (error) {
                        alert('Error al reproducir la cámara: ' + error.message);
                    }
                })
                .catch(function(err) {
                    alert('No se pudo acceder a la cámara: ' + err.message);
                });
        }
    } catch (error) {
        alert('Error al solicitar acceso a la cámara: ' + error.message);
    }

    btnTomarFoto.addEventListener('click', function() {
        try {
            const ctxFoto = canvasFoto.getContext('2d');
            ctxFoto.drawImage(video, 0, 0, canvasFoto.width, canvasFoto.height);
            // Mostrar botón de descarga
            enlaceDescarga.href = canvasFoto.toDataURL('image/jpeg');
            enlaceDescarga.style.display = 'inline-block';
        } catch (error) {
            alert('Error al capturar la foto: ' + error.message);
        }
    });
</script>
@stop 