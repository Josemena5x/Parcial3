@extends('layouts.app')

@section('content')
  <div class="canvas-container">
    <h2>🎨 Dibuja libremente</h2>
    <canvas id="canvas" width="500" height="400"></canvas>

    <div class="controls">
    <label for="color">Color:</label>
    <input type="color" id="color" value="#000000">

    <label for="size">Grosor:</label>
    <input type="range" id="size" min="1" max="20" value="2">

    <button id="borrador">🧽 Borrador</button>
    <button id="limpiar">🔄 Limpiar todo</button>
    <button id="guardar">💾 Guardar</button>
    </div>
  </div>

  <div class="video-api-container">
    <h2>📸 Cámara Web</h2>

    <div class="video-preview">
    <video id="video" autoplay playsinline></video>
    <canvas id="photo-canvas" style="display:none;"></canvas>
    <img id="photo-preview" style="display:none;" />
    </div>

    <div class="controls">
    <button id="start-camera">📡 Encender cámara</button>
    <button id="stop-camera" disabled>⛔ Apagar cámara</button>
    <button id="capture-btn" disabled>📷 Tomar foto</button>
    <button id="retake-btn" style="display:none;">🔄 Volver a tomar</button>
    <a id="download-link" style="display:none;">📥 Descargar foto</a>
    </div>
  </div>


@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/canvas.css') }}">
  <link rel="stylesheet" href="{{ asset('css/apis/video.css') }}">
@endpush

@push('scripts')
  <script src="{{ asset('js/canvas.js') }}"></script>
  <script src="{{ asset('js/apis/video.js') }}"></script>
@endpush