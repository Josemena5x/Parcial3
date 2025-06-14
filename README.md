<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🚀 Examen Parcial 3 - Desarrollo y Técnicas de Aplicaciones Web 
📘 Universidad de El Salvador - FMOcc | Ingeniería en Desarrollo de Software 
Ciclo I - 2025 | Grupo GT01 | Materia: DTW135

## 🧠 Tema: APIs y Web Workers

🎯 Objetivo General

Desarrollar una práctica integradora utilizando APIs modernas del navegador y Web Workers, incorporándose a un proyecto web basado en Laravel.

👨‍💻 Tecnologías Utilizadas

|    Tecnología       |            Descripción                       |
|------------------------------------------------------------------- |
| 🌐 Laravel          | Framework base del proyecto                  |
| 🗺️ LeafletJS        | Mapa interactivo con OpenStreetMap           |
| 📍 Geolocation API  | Obtener coordenadas del usuario              |
| 🎨 Canvas API       | Dibujo libre sobre lienzo HTML               |
| 📷 MediaDevices API | Captura de cámara web                        |
| 👷 Web Workers      | Cálculos intensivos fuera del hilo principal |
| 🧪 JavaScript       | Lógica del lado del cliente                  |
| 📄 Blade (Laravel)  | Vistas dinámicas                             |

📌 Ejercicios Requeridos

1. 📍 **API de Geolocalización**
- Vista: `apis.blade.php` (acceso desde sidebar)
- Mostrar:
 - Coordenadas del usuario (latitud, longitud)
 - Mapa interactivo con ubicación (LeafletJS)

2. 🖌️ **API de Canvas**
- Zona de dibujo libre con mouse (líneas negras)
- Botón para guardar el lienzo como `.jpg` (cliente)

3. 🎥 **API de Video**
- Mostrar video en tiempo real desde cámara web
- Botón para capturar y guardar imagen

4. 🧮 **Web Workers**
- Crear worker en `public/js/`
- Vista: `workers.blade.php`
- Simular cálculo intensivo: generar 100,000 números aleatorios
- Enviar al worker, ordenar y mostrar primeros 50 resultados
- Implementar manejo de errores (`try-catch`)

📅 Entrega

- **Fecha límite:** Viernes 13 de junio, 11:59 p.m.
- **Repositorio:** Fork del proyecto base proporcionado
- **Enlace de entrega:** Enviar el repositorio público al correo 
📩 `mauricio.rosales2@ues.edu.sv`

👥 Integrantes del Grupo

| Nombre Completo                           | Código    |
|-------------------------------------------|-----------|
| Albert Uziel Hernández Mendoza            | HM20019   |
| Miguel Alejandro Linares Mendoza          | LM22040   |
| Franklin Giovanny Ávila González          | AG22076   |
| José Manuel Cerritos Estrada              | EE22004   |
| Dora Elizabeth Hernández Chachagua        | HC22030   |
| José Antonio Mena Ávila                   | MA99048   |

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
