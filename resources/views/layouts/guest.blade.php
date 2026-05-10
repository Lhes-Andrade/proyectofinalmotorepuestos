<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MotoRepuestos') }}</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/5064/5064596.png" type="image/x-icon">

    {{-- Mantenemos los estilos de Breeze por si los componentes internos los usan --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #1b1b18 0%, #3a2a1a 50%, #f53003 100%);
            position: relative;
            overflow-x: hidden;
        }

        /* Patrón de fondo sutil */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url("https://images.unsplash.com/photo-1558981403-c5f9899a28bc?w=1600");
            background-size: cover;
            background-position: center;
            opacity: 0.1;
            z-index: 0;
        }

        .auth-container {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        /* Logo / marca */
        .brand-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            text-decoration: none;
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .brand-logo:hover {
            color: white;
            transform: scale(1.05);
        }

        .brand-logo i {
            color: #f53003;
            background: white;
            padding: 0.5rem;
            border-radius: 50%;
            font-size: 1.5rem;
        }

        /* Tarjeta del formulario */
        .auth-card {
            width: 100%;
            max-width: 28rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 1.5rem 3rem rgba(0, 0, 0, 0.3);
            overflow: hidden;
            animation: slideUp 0.5s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Cabecera de la tarjeta */
        .auth-card-header {
            background: linear-gradient(135deg, #1b1b18 0%, #f53003 100%);
            color: white;
            padding: 1.5rem 2rem;
            text-align: center;
        }

        .auth-card-header h4 {
            margin: 0;
            font-weight: 700;
        }

        .auth-card-header p {
            margin: 0.25rem 0 0;
            opacity: 0.9;
            font-size: 0.9rem;
        }

        /* Cuerpo del formulario */
        .auth-card-body {
            padding: 2rem;
        }

        /* Estilos para los inputs de Breeze --
           Breeze inyecta sus propios componentes con clases de Tailwind.
           Estas reglas aseguran que se vean bien con nuestro estilo. */
        .auth-card-body input[type="text"],
        .auth-card-body input[type="email"],
        .auth-card-body input[type="password"] {
            width: 100% !important;
            padding: 0.65rem 0.9rem !important;
            border: 1px solid #ced4da !important;
            border-radius: 0.5rem !important;
            font-size: 1rem !important;
            transition: border-color 0.2s, box-shadow 0.2s !important;
            box-shadow: none !important;
        }

        .auth-card-body input[type="text"]:focus,
        .auth-card-body input[type="email"]:focus,
        .auth-card-body input[type="password"]:focus {
            border-color: #f53003 !important;
            box-shadow: 0 0 0 0.2rem rgba(245, 48, 3, 0.15) !important;
            outline: none !important;
        }

        /* Botones primarios de Breeze (usan clase x-primary-button) */
        .auth-card-body button[type="submit"],
        .auth-card-body .inline-flex.items-center.px-4.py-2.bg-gray-800 {
            background: #f53003 !important;
            border: none !important;
            color: white !important;
            padding: 0.65rem 1.5rem !important;
            border-radius: 50px !important;
            font-weight: 600 !important;
            text-transform: none !important;
            letter-spacing: normal !important;
            transition: background 0.2s !important;
        }

        .auth-card-body button[type="submit"]:hover {
            background: #d12902 !important;
        }

        /* Enlaces */
        .auth-card-body a {
            color: #f53003;
            text-decoration: none;
            font-weight: 500;
        }

        .auth-card-body a:hover {
            color: #d12902;
            text-decoration: underline;
        }

        /* Labels */
        .auth-card-body label {
            font-weight: 500;
            color: #333;
            margin-bottom: 0.4rem;
        }

        /* Pie de la tarjeta con enlace de regreso */
        .back-home {
            margin-top: 1.5rem;
            text-align: center;
        }

        .back-home a {
            color: white;
            text-decoration: none;
            opacity: 0.85;
            transition: opacity 0.2s;
        }

        .back-home a:hover {
            opacity: 1;
            color: white;
        }
    </style>
</head>

<body>
    <div class="auth-container">
        {{-- Logo/Marca --}}
        <a href="/" class="brand-logo">
            <i class="bi bi-gear-fill"></i>
            MotoRepuestos
        </a>

        {{-- Tarjeta del formulario --}}
        <div class="auth-card">
            <div class="auth-card-header">
                <h4><i class="bi bi-shield-lock-fill"></i> Acceso a la plataforma</h4>
                <p>Ingresa tus datos para continuar</p>
            </div>

            <div class="auth-card-body">
                {{ $slot }}
            </div>
        </div>

        {{-- Enlace para volver al inicio --}}
        <div class="back-home">
            <a href="/">
                <i class="bi bi-arrow-left"></i> Volver al inicio
            </a>
        </div>
    </div>
</body>

</html>