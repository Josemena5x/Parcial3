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
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/canvas.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/canvas.js') }}"></script>
@endpush
