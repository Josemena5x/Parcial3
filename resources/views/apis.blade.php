@extends('layouts.app')

@section('content')
    {{-- Contenedor con dos secciones ocultables --}}
    <div>
        {{-- Sección Mapa --}}
        <section id="map-section">
            <h2>📍 Geolocalización del Usuario</h2>
            <div id="geo-output" class="mb-3 p-2 bg-secondary rounded"></div>
            <div id="map" style="height: 400px; width: 100%; border: 1px solid #aaa;" class="rounded"></div>
        </section>

        {{-- Sección Canvas --}}
        <section id="canvas-section" style="display:none;">
            <h2>🎨 Dibuja libremente</h2>
            <canvas id="canvas" width="500" height="400"></canvas>
            <div class="controls mt-3">
                <label for="color">Color:</label>
                <input type="color" id="color" value="#000000">

                <label for="size">Grosor:</label>
                <input type="range" id="size" min="1" max="20" value="2">

                <button id="borrador">🧽 Borrador</button>
                <button id="limpiar">🔄 Limpiar todo</button>
                <button id="guardar">💾 Guardar</button>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const output = document.getElementById('geo-output');
    const mapSection = document.getElementById('map-section');
    const canvasSection = document.getElementById('canvas-section');

    // Inicializa el mapa
    function initMap() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                output.innerHTML = `<strong>Latitud:</strong> ${lat}<br><strong>Longitud:</strong> ${lon}`;

                const map = L.map('map').setView([lat, lon], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);

                L.marker([lat, lon]).addTo(map)
                    .bindPopup("Tu ubicación actual")
                    .openPopup();

            }, function (error) {
                output.innerHTML = "Permiso denegado o error al obtener ubicación.";
            });
        } else {
            output.innerHTML = "Geolocalización no soportada por este navegador.";
        }
    }

    // Inicializa el canvas con tu lógica (si tienes canvas.js cargado, esto es solo un ejemplo)
    function initCanvas() {
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        ctx.fillStyle = '#fff';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        // Aquí puedes agregar más lógica o llamar a tu canvas.js si quieres.
    }

    initMap();
    initCanvas();

    // Función para cambiar vista según clic del sidebar
    window.showSection = function(section) {
        if (section === 'map') {
            mapSection.style.display = 'block';
            canvasSection.style.display = 'none';
        } else if (section === 'canvas') {
            mapSection.style.display = 'none';
            canvasSection.style.display = 'block';
        }
    }
});
</script>
<script src="{{ asset('js/apis/apis.js') }}"></script> 
@endpush