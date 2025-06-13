<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de APIs</title>

    <link rel="stylesheet" href="{{ asset('css/apis/apis.css') }}">
    <link rel="stylesheet" href="{{ asset('css/apis/video.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    @stack('styles')
    @yield('head')
</head>

<body style="margin: 0; font-family: Arial, sans-serif;">
    <div style="display: flex; height: 100vh; overflow: hidden;">

        {{-- Sidebar --}}
        <aside style="width: 220px; background-color: #343a40; color: white; padding: 20px;">
            <h2 style="color: #ffc107;">🧭 Menú</h2>
            <ul style="list-style: none; padding: 0;">
                <li style="margin-bottom: 10px;">
                    <a href="javascript:void(0);" onclick="showSection('map')" style="color: #ffc107; text-decoration: none;">
                        🗺️ Mapa
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" onclick="showSection('canvas')" style="color: white; text-decoration: none;">
                        🎨 Canvas
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" onclick="showSection('video')" style="color: white; text-decoration: none;">
                        📸 Cámara
                    </a>
                </li>
            </ul>
        </aside>

        <main style="flex: 1; padding: 20px; overflow-y: auto;">
            @yield('content')
        </main>
    </div>


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    @stack('scripts')
    @yield('scripts')
</body>
</html>
