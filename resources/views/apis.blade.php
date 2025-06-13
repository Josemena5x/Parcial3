@extends('layouts.app')

@section('content')
<div class="container mt-4">

  {{-- Sección Geolocalización --}}
  <section id="map-section" class="mb-5">
    <h2>📍 Geolocalización del Usuario</h2>
    <div id="geo-output" class="mb-3 p-2 bg-secondary text-white rounded"></div>
    <div id="map" style="height: 400px; width: 100%; border: 1px solid #aaa;" class="rounded"></div>
  </section>

  {{-- Sección Canvas --}}
  <section id="canvas-section" class="mb-5">
    <h2>🎨 Dibuja libremente</h2>
    <canvas id="canvas" width="500" height="400" class="border rounded"></canvas>

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

  {{-- Sección Cámara --}}
  <section id="video-section" class="mb-5">
    <h2>📸 Cámara Web</h2>

    <div class="video-preview mb-3">
      <video id="video" autoplay playsinline class="border rounded" width="500"></video>
      <canvas id="photo-canvas" style="display:none;"></canvas>
      <img id="photo-preview" style="display:none;" class="mt-2 border rounded" />
    </div>

    <div class="controls">
      <button id="start-camera">📡 Encender cámara</button>
      <button id="stop-camera" disabled>⛔ Apagar cámara</button>
      <button id="capture-btn" disabled>📷 Tomar foto</button>
      <button id="retake-btn" style="display:none;">🔄 Volver a tomar</button>
      <a id="download-link" style="display:none;">📥 Descargar foto</a>
    </div>
  </section>

</div>
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/canvas.css') }}">
  <link rel="stylesheet" href="{{ asset('css/apis/video.css') }}">
@endpush

@push('scripts')
  <script src="{{ asset('js/canvas.js') }}"></script>
  <script src="{{ asset('js/apis/video.js') }}"></script>}
  <script src="{{ asset('js/apis/apis.js') }}"></script>

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

      // Inicializa el canvas
      function initCanvas() {
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        ctx.fillStyle = '#fff';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
      }

      initMap();
      initCanvas();

      // Función para cambiar de sección (opcional si hay botones en el sidebar)
      window.showSection = function (section) {
        mapSection.style.display = (section === 'map') ? 'block' : 'none';
        canvasSection.style.display = (section === 'canvas') ? 'block' : 'none';
      }
    });
  </script>
@endpush
