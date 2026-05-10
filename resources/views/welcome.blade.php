<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/5064/5064596.png" type="image/x-icon">
    <title>MotoRepuestos - Bienvenido</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        /* Compensar la altura del navbar fijo */
        main {
            padding-top: 76px;
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

        /* ===== CARRUSEL ===== */
        .carousel-section {
            padding: 2rem 0;
            background: #f8f9fa;
        }

        .carousel-section .carousel-caption h5 {
            background-color: rgba(27, 27, 24, 0.85);
        }

        .carousel-section .carousel-item img {
            height: 450px;
            width: 100%;
            max-width: 900px;
            object-fit: cover;
            object-position: center;
        }

        @media (max-width: 768px) {
            .carousel-section .carousel-item img {
                height: 300px;
            }
        }

        /* ===== HERO ===== */
        .hero {
            background: linear-gradient(135deg, #1b1b18 0%, #3a2a1a 50%, #f53003 100%);
            color: white;
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("https://images.unsplash.com/photo-1558981403-c5f9899a28bc?w=1600");
            background-size: cover;
            background-position: center;
            opacity: 0.15;
            z-index: 0;
        }

        .hero>.container {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-weight: 800;
            font-size: 3rem;
        }

        .hero .lead {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        /* ===== TARJETAS DE FEATURES ===== */
        .feature-card {
            border: none;
            border-radius: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1rem;
            background-color: #fff2f2;
            color: #f53003;
        }

        /* ===== SECCIÓN ESTADÍSTICAS ===== */
        .stats-section {
            background-color: #1b1b18;
            color: white;
            padding: 3rem 0;
        }

        .stat-number {
            font-size: 2.8rem;
            font-weight: 800;
            color: #f53003;
        }

        /* ===== CTA FINAL ===== */
        .cta-section {
            background: linear-gradient(135deg, #f53003 0%, #ff6b35 100%);
            color: white;
            padding: 4rem 0;
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

        .profile-icon+.dropdown-menu {
            background-color: #1b1b18;
            border: 1px solid rgba(255, 255, 255, 0.1);
            min-width: 200px;
        }

        .profile-icon+.dropdown-menu .dropdown-item {
            color: rgba(255, 255, 255, 0.9);
            background: transparent;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }

        .profile-icon+.dropdown-menu .dropdown-item:hover {
            background-color: #f53003;
            color: white;
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
                {{-- Menú de navegación principal --}}
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

                {{-- Lado derecho --}}
                <ul class="navbar-nav align-items-lg-center gap-2">
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a href="/ventas" class="btn btn-ventas btn-custom">
                            <i class="bi bi-cash-coin"></i> Ventas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/registros" class="btn btn-registros btn-custom">
                            <i class="bi bi-journal-text"></i> Registros
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link profile-icon" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-header text-white-50">
                                <small>Hola, {{ Auth::user()->name }}</small>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
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
    <main>
        {{-- ================= HERO ================= --}}
        <section class="hero">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <span class="badge bg-danger mb-3 px-3 py-2">🏍️ Tu tienda especializada</span>
                        <h1 class="mb-3">
                            Encuentra el repuesto que tu moto necesita
                        </h1>
                        <p class="lead mb-4">
                            Miles de repuestos originales y compatibles, ubicación de tiendas en tiempo real
                            y los mejores precios. Todo desde una sola plataforma.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            @guest
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-light btn-custom btn-lg">
                                <i class="bi bi-person-plus-fill"></i> Crear cuenta gratis
                            </a>
                            @endif
                            @endguest
                            <a href="#caracteristicas" class="btn btn-outline-light btn-custom btn-lg">
                                <i class="bi bi-info-circle"></i> Saber más
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 text-center">
                        <i class="bi bi-tools" style="font-size: 12rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </section>

        {{-- ================= CARRUSEL (lo que tenías en el index) ================= --}}
        <section class="carousel-section">
            <div class="container">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?w=1200&auto=format&fit=crop"
                                class="border border-dark p-2 d-block w-50 mx-auto rounded-5"
                                alt="motoRepuestos">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-white py-2 w-50 mx-auto rounded">¡Encuentra TODOS tus repuestos!</h5>
                                <p class="bg-body text-black w-50 mx-auto py-2 rounded text-center">
                                    Encuentra el repuesto que necesitas con facilidad.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://reinspirit.com/wp-content/uploads/2017/02/localizador-de-tiendas.jpg"
                                class="border border-dark p-2 d-block w-50 mx-auto rounded-5"
                                alt="mapaTiendas">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-white py-2 w-50 mx-auto rounded">Ubicaciones en tiempo real</h5>
                                <p class="bg-body text-black w-50 mx-auto py-2 rounded text-center">Encuentra tiendas que tienen tus repuestos en pocos clic's.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="bg-dark p-4 rounded carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="bg-dark p-4 rounded carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        {{-- ================= CARACTERÍSTICAS ================= --}}
        <section id="caracteristicas" class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">¿Qué encontrarás al ingresar?</h2>
                    <p class="text-muted">Todo lo que necesitas para mantener tu moto en perfecto estado</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="card feature-card shadow-sm p-4">
                            <div class="feature-icon">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            <h5 class="fw-bold">Catálogo de Productos</h5>
                            <p class="text-muted mb-0">
                                Explora nuestro amplio inventario de repuestos para todo tipo de motocicletas,
                                con descripciones detalladas e imágenes.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card feature-card shadow-sm p-4">
                            <div class="feature-icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <h5 class="fw-bold">Tiendas Cercanas</h5>
                            <p class="text-muted mb-0">
                                Localiza en tiempo real las tiendas que tienen disponible el repuesto
                                que necesitas, ahorra tiempo y dinero.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card feature-card shadow-sm p-4">
                            <div class="feature-icon">
                                <i class="bi bi-cart-check-fill"></i>
                            </div>
                            <h5 class="fw-bold">Gestión de Ventas</h5>
                            <p class="text-muted mb-0">
                                Lleva el control de tus pedidos, historial de compras y facturación
                                de manera ordenada y sencilla.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card feature-card shadow-sm p-4">
                            <div class="feature-icon">
                                <i class="bi bi-chat-dots-fill"></i>
                            </div>
                            <h5 class="fw-bold">Mensajería Directa</h5>
                            <p class="text-muted mb-0">
                                Comunícate con vendedores y soporte técnico para resolver tus dudas
                                sobre cualquier producto.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card feature-card shadow-sm p-4">
                            <div class="feature-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h5 class="fw-bold">Compras Seguras</h5>
                            <p class="text-muted mb-0">
                                Tus datos y transacciones están protegidos. Compra con la confianza
                                de una plataforma confiable.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card feature-card shadow-sm p-4">
                            <div class="feature-icon">
                                <i class="bi bi-headset"></i>
                            </div>
                            <h5 class="fw-bold">Soporte 24/7</h5>
                            <p class="text-muted mb-0">
                                Nuestro equipo está siempre disponible para ayudarte en lo que necesites,
                                cuando lo necesites.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ================= ESTADÍSTICAS ================= --}}
        <section class="stats-section">
            <div class="container">
                <div class="row text-center g-4">
                    <div class="col-6 col-md-3">
                        <div class="stat-number">+5K</div>
                        <p class="mb-0">Repuestos disponibles</p>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-number">+200</div>
                        <p class="mb-0">Tiendas registradas</p>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-number">+10K</div>
                        <p class="mb-0">Clientes satisfechos</p>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-number">24/7</div>
                        <p class="mb-0">Atención al cliente</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- ================= CTA FINAL ================= --}}
        <section class="cta-section text-center">
            <div class="container">
                <h2 class="fw-bold mb-3">¿Listo para encontrar tu repuesto?</h2>
                <p class="lead mb-4">Únete a nuestra comunidad y descubre todo lo que tenemos para ti.</p>
                @if (Route::has('register'))
                @guest
                <a href="{{ route('register') }}" class="btn btn-light btn-custom btn-lg me-2">
                    <i class="bi bi-person-plus-fill"></i> Registrarse ahora
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-custom btn-lg">
                    <i class="bi bi-box-arrow-in-right"></i> Ya tengo cuenta
                </a>
                @endguest
                @auth
                <a href="{{ url('/productos') }}" class="btn btn-light btn-custom btn-lg">
                    <i class="bi bi-cart-check"></i> Ir a la Tienda
                </a>
                @endauth
                @endif
            </div>
        </section>
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