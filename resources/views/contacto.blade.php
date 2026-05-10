@extends('layouts.public')

@section('titulo', 'Contacto - MotoRepuestos')

@section('contenido')
{{-- Estilos específicos de esta página --}}
<style>
    .contacto-header {
        background: linear-gradient(135deg, #1b1b18 0%, #f53003 100%);
        color: white;
        padding: 3rem 1rem;
        border-radius: 1rem;
        margin-bottom: 2rem;
        text-align: center;
    }

    .contacto-header h1 {
        font-weight: 800;
        margin: 0;
    }

    .contacto-header p {
        opacity: 0.9;
        margin: 0.5rem 0 0;
    }

    /* Tarjetas (formulario + video) */
    .contacto-card {
        background: white;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
        border: none;
        border-top: 4px solid #f53003;
        margin-bottom: 1.5rem;
    }

    .contacto-card:last-child {
        margin-bottom: 0;
    }

    .contacto-card h3 {
        font-weight: 700;
        color: #1b1b18;
    }

    .contacto-card .form-label {
        font-weight: 500;
        color: #333;
    }

    .contacto-card .form-control:focus,
    .contacto-card .form-select:focus {
        border-color: #f53003;
        box-shadow: 0 0 0 0.2rem rgba(245, 48, 3, 0.15);
    }

    .contacto-card .form-check-input:checked {
        background-color: #f53003;
        border-color: #f53003;
    }

    .btn-enviar {
        background-color: #f53003;
        border-color: #f53003;
        color: white;
        border-radius: 50px;
        padding: 0.7rem 2rem;
        font-weight: 600;
        transition: background-color 0.2s, transform 0.2s;
    }

    .btn-enviar:hover {
        background-color: #d12902;
        border-color: #d12902;
        color: white;
        transform: translateY(-2px);
    }

    /* Iframe del video con bordes redondeados */
    .video-wrapper {
        border-radius: 0.75rem;
        overflow: hidden;
    }

    /* Alerta de éxito */
    .alert-success-custom {
        background-color: #d4edda;
        border-left: 4px solid #28a745;
        color: #155724;
        border-radius: 0.5rem;
    }

    @media (min-width: 992px) {
        .row.g-4>.col-lg-5 {
            display: flex;
            flex-direction: column;
        }

        .row.g-4>.col-lg-5>.contacto-card:last-child {
            flex-grow: 1;
        }
    }
</style>

{{-- ================= ENCABEZADO ================= --}}
<div class="contacto-header">
    <h1><i class="bi bi-envelope-fill"></i> Contáctanos</h1>
    <p>Estamos aquí para ayudarte. Cuéntanos en qué podemos servirte.</p>
</div>

{{-- Mensaje de éxito si el formulario se envió correctamente --}}
@if (session('success'))
<div class="alert alert-success-custom alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- Mensajes de error de validación --}}
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong><i class="bi bi-exclamation-triangle-fill"></i> Revisa los siguientes campos:</strong>
    <ul class="mb-0 mt-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row g-4">

    {{-- ================= FORMULARIO DE CONTACTO ================= --}}
    <div class="col-lg-7">
        <div class="contacto-card">
            <h3 class="mb-4">
                <i class="bi bi-chat-square-text-fill text-danger"></i> Envíanos un mensaje
            </h3>

            <form action="{{ route('pqrs.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombres</label>
                        <input name="nombres" type="text" class="form-control"
                            value="{{ old('nombres') }}" placeholder="Ingresa tus nombres" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Apellidos</label>
                        <input name="apellidos" type="text" class="form-control"
                            value="{{ old('apellidos') }}" placeholder="Ingresa tus apellidos" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Correo electrónico</label>
                        <input name="correo" type="email" class="form-control"
                            value="{{ old('correo') }}" placeholder="ejemplo@email.com" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Asunto</label>
                        <input name="asunto" type="text" class="form-control"
                            value="{{ old('asunto') }}" placeholder="Motivo del contacto" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tipo de solicitud</label>
                        <select class="form-select" name="tipo" required>
                            <option value="" selected disabled hidden>Seleccione una opción</option>
                            <option value="Queja" {{ old('tipo') == 'Queja' ? 'selected' : '' }}>Queja</option>
                            <option value="Petición" {{ old('tipo') == 'Petición' ? 'selected' : '' }}>Petición</option>
                            <option value="Felicitaciones" {{ old('tipo') == 'Felicitaciones' ? 'selected' : '' }}>Felicitaciones</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Mensaje</label>
                        <textarea name="mensaje" class="form-control" rows="4"
                            placeholder="Escribe tu mensaje aquí..." required>{{ old('mensaje') }}</textarea>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="acepto" name="acepto" required>
                            <label class="form-check-label" for="acepto">
                                Acepto los <a href="#" class="text-danger fw-semibold">términos y condiciones</a>
                            </label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-enviar w-100">
                            <i class="bi bi-send-fill"></i> Enviar mensaje
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- ================= COLUMNA DERECHA: VIDEO ================= --}}
    <div class="col-lg-5">

        {{-- Video institucional --}}
        <div class="contacto-card">
            <h3 class="mb-4">
                <i class="bi bi-play-circle-fill text-danger"></i> Conócenos
            </h3>
            <div class="ratio ratio-16x9 video-wrapper">
                <iframe
                    src="https://www.youtube.com/embed/ueGoScRwCp8?si=tV9GVO-ItzZpzkmt"
                    title="Video institucional"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection