@extends('layouts.public')

@section('titulo', 'Sobre nosotros - MotoRepuestos')

@section('contenido')
    {{-- Estilos específicos de esta página --}}
    <style>
        .nosotros-header {
            background: linear-gradient(135deg, #1b1b18 0%, #f53003 100%);
            color: white;
            padding: 4rem 1rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .nosotros-header::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("https://images.unsplash.com/photo-1558981403-c5f9899a28bc?w=1600");
            background-size: cover;
            background-position: center;
            opacity: 0.15;
        }

        .nosotros-header > * {
            position: relative;
            z-index: 1;
        }

        .nosotros-header h1 {
            font-weight: 800;
            margin: 0;
            font-size: 2.8rem;
        }

        .nosotros-header p {
            opacity: 0.9;
            margin: 0.5rem 0 0;
            font-size: 1.15rem;
        }

        /* Tarjeta general */
        .seccion-card {
            background: white;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .seccion-titulo {
            font-weight: 700;
            color: #1b1b18;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
            display: inline-block;
        }

        .seccion-titulo::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: #f53003;
            border-radius: 2px;
        }

        .seccion-card p {
            color: #555;
            line-height: 1.7;
        }

        /* Tarjetas de Misión, Visión, Valores */
        .mvv-card {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            text-align: center;
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-top: 4px solid #f53003;
        }

        .mvv-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
        }

        .mvv-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f53003 0%, #ff6b35 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            margin: 0 auto 1.5rem;
            box-shadow: 0 0.5rem 1rem rgba(245, 48, 3, 0.3);
        }

        .mvv-card h4 {
            font-weight: 700;
            color: #1b1b18;
            margin-bottom: 1rem;
        }

        .mvv-card p {
            color: #666;
            margin: 0;
            line-height: 1.6;
        }

        /* Equipo */
        .equipo-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
            text-align: center;
        }

        .equipo-card:hover {
            transform: translateY(-5px);
        }

        .equipo-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1b1b18 0%, #f53003 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin: 2rem auto 1rem;
            border: 4px solid #fff2f2;
        }

        .equipo-card h5 {
            font-weight: 700;
            color: #1b1b18;
            margin-bottom: 0.25rem;
        }

        .equipo-card .rol {
            color: #f53003;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .equipo-card .descripcion {
            color: #666;
            font-size: 0.9rem;
            padding: 0 1.5rem 2rem;
            margin-top: 0.75rem;
        }

        /* Video institucional */
        .video-wrapper {
            border-radius: 0.75rem;
            overflow: hidden;
        }

        /* Sección destacada (cita) */
        .quote-section {
            background: linear-gradient(135deg, #1b1b18 0%, #3a2a1a 100%);
            color: white;
            padding: 3rem 2rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
        }

        .quote-section i.bi-quote {
            font-size: 3rem;
            color: #f53003;
            opacity: 0.6;
        }

        .quote-section p {
            font-size: 1.3rem;
            font-style: italic;
            margin: 1rem 0 0;
            font-weight: 300;
        }
    </style>

    {{-- ================= ENCABEZADO ================= --}}
    <div class="nosotros-header">
        <h1><i class="bi bi-people-fill"></i> Sobre Nosotros</h1>
        <p>Conoce la historia, los valores y el equipo detrás de MotoRepuestos</p>
    </div>

    {{-- ================= NUESTRA HISTORIA ================= --}}
    <div class="seccion-card">
        <h2 class="seccion-titulo">
            <i class="bi bi-book-fill text-danger"></i> Nuestra Historia
        </h2>
        <p>
            MotoRepuestos nació con una idea simple pero poderosa: facilitar a los motociclistas
            colombianos el acceso a repuestos de calidad, originales y compatibles, sin tener
            que recorrer media ciudad buscándolos. Lo que empezó como un pequeño taller familiar
            en Pasto, hoy se ha convertido en una plataforma digital que conecta a miles de
            usuarios con cientos de tiendas a lo largo del país.
        </p>
        <p>
            A lo largo de los años hemos crecido junto a nuestros clientes, escuchando sus
            necesidades y mejorando constantemente. Sabemos que detrás de cada repuesto hay
            una moto que es más que un medio de transporte: es libertad, trabajo, pasión.
            Por eso ponemos el mismo cuidado en cada producto que ofrecemos.
        </p>
        <p>
            Hoy seguimos comprometidos con la misma misión con la que empezamos: que ningún
            motociclista se quede varado por no encontrar el repuesto que necesita. Nuestra
            historia continúa, y queremos que tú formes parte de ella.
        </p>
    </div>

    {{-- ================= MISIÓN, VISIÓN, VALORES ================= --}}
    <div class="row g-4 mb-3">
        <div class="col-md-4">
            <div class="mvv-card">
                <div class="mvv-icon">
                    <i class="bi bi-bullseye"></i>
                </div>
                <h4>Misión</h4>
                <p>
                    Ofrecer a los motociclistas el acceso más rápido y confiable a repuestos
                    de calidad, conectando tiendas y clientes a través de la tecnología.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mvv-card">
                <div class="mvv-icon">
                    <i class="bi bi-eye-fill"></i>
                </div>
                <h4>Visión</h4>
                <p>
                    Ser la plataforma líder en Colombia para la búsqueda y compra de repuestos
                    de motocicleta, expandiéndonos a toda Latinoamérica.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mvv-card">
                <div class="mvv-icon">
                    <i class="bi bi-heart-fill"></i>
                </div>
                <h4>Valores</h4>
                <p>
                    Honestidad, calidad, compromiso con el cliente, innovación constante
                    y pasión por el mundo de las dos ruedas.
                </p>
            </div>
        </div>
    </div>

    {{-- ================= CITA INSPIRADORA ================= --}}
    <div class="quote-section">
        <i class="bi bi-quote"></i>
        <p>"Tu moto merece los mejores repuestos, y tú mereces el mejor servicio."</p>
    </div>

    {{-- ================= NUESTRO EQUIPO ================= --}}
    <div class="seccion-card">
        <h2 class="seccion-titulo">
            <i class="bi bi-people text-danger"></i> Nuestro Equipo
        </h2>
        <p class="mb-4">
            Detrás de MotoRepuestos hay un equipo apasionado por las motos y la tecnología,
            comprometido con brindarte la mejor experiencia.
        </p>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="equipo-card">
                    <div class="equipo-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <h5>Jefferson Galarza Tapiero</h5>
                    <div class="rol">Co-fundador & Desarrollador</div>
                    <p class="descripcion">
                        Apasionado por la tecnología y las motos. Lidera el desarrollo
                        de la plataforma para que la experiencia del usuario sea siempre fluida.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="equipo-card">
                    <div class="equipo-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <h5>Lhes Jamer Andrade Delgado</h5>
                    <div class="rol">Co-fundador & Desarrollador</div>
                    <p class="descripcion">
                        Encargado de hacer que cada repuesto encuentre a su motociclista.
                        Su misión: que siempre tengas lo que tu moto necesita.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= VIDEO INSTITUCIONAL ================= --}}
    <div class="seccion-card">
        <h2 class="seccion-titulo">
            <i class="bi bi-play-circle-fill text-danger"></i> Conoce Más Sobre Nosotros
        </h2>
        <p class="mb-4">
            Mira nuestro video institucional y descubre cómo trabajamos día a día para
            ofrecerte el mejor servicio.
        </p>
        <div class="ratio ratio-16x9 video-wrapper">
            <iframe
                src="https://www.youtube.com/embed/dl-Nvizvqiw?si=u4fR6EJ7sHPB94gn"
                title="Video Institucional"
                allowfullscreen>
            </iframe>
        </div>
    </div>
@endsection