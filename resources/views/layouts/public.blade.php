<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/5064/5064596.png" type="image/x-icon">
    <title>@yield('titulo', 'MotoRepuestos')</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        main {
            padding-top: 76px;
            min-height: calc(100vh - 76px - 80px);
        }

        /* ===== NAVBAR ===== */
        .navbar-custom {
            background-color: rgba(27, 27, 24, 0.95);
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            font-weight: 700;
            color: #f53003 !important;
        }

        .navbar-custom .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: color 0.2s;
        }

        .navbar-custom .nav-link:hover {
            color: #f53003 !important;
        }

        .navbar-custom .dropdown-menu {
            background-color: #1b1b18;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar-custom .dropdown-item {
            color: rgba(255, 255, 255, 0.9);
        }

        .navbar-custom .dropdown-item:hover {
            background-color: #f53003;
            color: white;
        }

        .btn-custom {
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            border-radius: 50px;
        }

        .btn-register {
            background-color: #f53003;
            border-color: #f53003;
            color: white;
        }

        .btn-register:hover {
            background-color: #d12902;
            border-color: #d12902;
            color: white;
        }

        /* ===== BOTÓN VENTAS (VERDE DINERO) ===== */
        .btn-ventas {
            background: linear-gradient(135deg, #1e9e4e 0%, #14803c 100%);
            border: none;
            color: white;
            box-shadow: 0 2px 8px rgba(20, 128, 60, 0.4);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-ventas:hover {
            background: linear-gradient(135deg, #25b85b 0%, #1a9447 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(20, 128, 60, 0.6);
        }

        /* ===== BOTÓN REGISTROS (DORADO) ===== */
        .btn-registros {
            background: linear-gradient(135deg, #ffd700 0%, #d4a017 100%);
            border: none;
            color: #1b1b18;
            box-shadow: 0 2px 8px rgba(212, 160, 23, 0.4);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-registros:hover {
            background: linear-gradient(135deg, #ffdf33 0%, #e0b020 100%);
            color: #1b1b18;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(212, 160, 23, 0.6);
        }

        /* ===== ÍCONO DE PERFIL ===== */
        .profile-icon {
            font-size: 1.8rem;
            padding: 0.25rem 0.5rem !important;
            color: white !important;
            transition: color 0.2s, transform 0.2s;
        }

        .profile-icon:hover {
            color: #f53003 !important;
            transform: scale(1.1);
        }

        .profile-icon::after {
            display: none;
        }

        .profile-icon + .dropdown-menu {
            background-color: #1b1b18;
            border: 1px solid rgba(255, 255, 255, 0.1);
            min-width: 200px;
        }

        .profile-icon + .dropdown-menu .dropdown-item {
            color: rgba(255, 255, 255, 0.9);
            background: transparent;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }

        .profile-icon + .dropdown-menu .dropdown-item:hover {
            background-color: #f53003;
            color: white;
        }

        .profile-icon + .dropdown-menu .dropdown-header {
            padding: 0.5rem 1rem;
        }

        footer {
            background-color: #1b1b18;
            color: #ccc;
        }
    </style>
</head>

<body>
    {{-- ================= NAVBAR ================= --}}
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-gear-fill"></i> MotoRepuestos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/productos">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contacto">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/nosotros">Sobre nosotros</a>
                    </li>
                </ul>

                {{-- Lado derecho del navbar --}}
                <ul class="navbar-nav align-items-lg-center gap-2">
                    @if (Route::has('login'))
                        @auth
                            {{-- Botón Ventas (verde dinero) --}}
                            <li class="nav-item">
                                <a href="/ventas" class="btn btn-ventas btn-custom">
                                    <i class="bi bi-cash-coin"></i> Ventas
                                </a>
                            </li>

                            {{-- Botón Registros (dorado) --}}
                            <li class="nav-item">
                                <a href="/registros" class="btn btn-registros btn-custom">
                                    <i class="bi bi-journal-text"></i> Registros
                                </a>
                            </li>

                            {{-- Ícono de perfil con menú desplegable --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link profile-icon" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li class="dropdown-header text-white-50">
                                        <small>Hola, {{ Auth::user()->name }}</small>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bi bi-box-arrow-right"></i> Salir
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="btn btn-outline-light btn-custom">
                                    <i class="bi bi-box-arrow-in-right"></i> Iniciar sesión
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="btn btn-register btn-custom">
                                        <i class="bi bi-person-plus-fill"></i> Registrarse
                                    </a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    {{-- ================= CONTENIDO ================= --}}
    <main>
        <div class="container my-4">
            @yield('contenido')
        </div>
    </main>

    {{-- ================= FOOTER ================= --}}
    <footer class="text-center py-4">
        <div class="container">
            <p class="mb-1">&copy; {{ date('Y') }} MotoRepuestos. Todos los derechos reservados.</p>
            <small>Desarrollado por Jefferson Galarza Tapiero y Lhes Jamer Andrade Delgado</small>
        </div>
    </footer>
</body>

</html>