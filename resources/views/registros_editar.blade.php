@extends('layouts.public')

@section('titulo', 'Editar Registro - MotoRepuestos')

@section('contenido')
    {{-- Estilos específicos de esta página --}}
    <style>
        .editar-header {
            background: linear-gradient(135deg, #d4a017 0%, #ffd700 100%);
            color: #1b1b18;
            padding: 2.5rem 1.5rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
        }

        .editar-header h1 {
            font-weight: 800;
            margin: 0;
        }

        .editar-header p {
            margin: 0.5rem 0 0;
            opacity: 0.85;
        }

        /* Tarjeta del formulario */
        .form-card {
            background: white;
            border: none;
            border-radius: 1rem;
            border-top: 4px solid #ffd700;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            padding: 2.5rem;
        }

        .form-card h3 {
            font-weight: 700;
            color: #1b1b18;
            margin-bottom: 0.5rem;
        }

        .form-card .subtitulo {
            color: #888;
            margin-bottom: 2rem;
        }

        .form-card .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-card .form-control:focus,
        .form-card .form-select:focus {
            border-color: #d4a017;
            box-shadow: 0 0 0 0.2rem rgba(212, 160, 23, 0.15);
        }

        .form-card .form-check-input:checked {
            background-color: #d4a017;
            border-color: #d4a017;
        }

        /* Info del registro */
        .info-registro {
            background: #fff8e7;
            border-left: 4px solid #ffd700;
            padding: 1rem 1.25rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .info-registro .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ffd700;
            color: #1b1b18;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .info-registro p {
            margin: 0;
            color: #555;
            font-size: 0.9rem;
        }

        .info-registro strong {
            color: #1b1b18;
        }

        /* Botones */
        .btn-guardar {
            background: linear-gradient(135deg, #d4a017 0%, #ffd700 100%);
            border: none;
            color: #1b1b18;
            border-radius: 50px;
            padding: 0.7rem 2rem;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(212, 160, 23, 0.3);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-guardar:hover {
            color: #1b1b18;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(212, 160, 23, 0.45);
        }

        .btn-cancelar {
            background: white;
            border: 2px solid #ddd;
            color: #555;
            border-radius: 50px;
            padding: 0.6rem 1.8rem;
            font-weight: 600;
            transition: background-color 0.2s, color 0.2s;
        }

        .btn-cancelar:hover {
            background: #f0f0f0;
            color: #1b1b18;
        }
    </style>

    {{-- ================= ENCABEZADO ================= --}}
    <div class="editar-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1><i class="bi bi-pencil-square"></i> Editar Registro</h1>
                <p>Modifica la información del registro #{{ $mensaje->id }}</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="{{ route('registros') }}" class="btn btn-cancelar">
                    <i class="bi bi-arrow-left"></i> Volver a Registros
                </a>
            </div>
        </div>
    </div>

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

    {{-- ================= FORMULARIO ================= --}}
    <div class="form-card">
        <h3><i class="bi bi-file-earmark-text-fill text-warning"></i> Información del registro</h3>
        <p class="subtitulo">Actualiza los datos y haz clic en "Guardar cambios" cuando termines.</p>

        {{-- Info adicional del registro --}}
        <div class="info-registro">
            <div class="info-icon">
                <i class="bi bi-info-circle-fill"></i>
            </div>
            <p>
                Estás editando el registro <strong>#{{ $mensaje->id }}</strong>
                @if ($mensaje->created_at)
                    , creado el <strong>{{ $mensaje->created_at->format('d/m/Y H:i') }}</strong>
                @endif
            </p>
        </div>

        <form action="{{ route('registros.update', $mensaje->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nombres</label>
                    <input name="nombres" type="text" class="form-control"
                        value="{{ old('nombres', $mensaje->nombres) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Apellidos</label>
                    <input name="apellidos" type="text" class="form-control"
                        value="{{ old('apellidos', $mensaje->apellidos) }}" required>
                </div>

                <div class="col-12">
                    <label class="form-label">Correo electrónico</label>
                    <input name="correo" type="email" class="form-control"
                        value="{{ old('correo', $mensaje->correo) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Asunto</label>
                    <input name="asunto" type="text" class="form-control"
                        value="{{ old('asunto', $mensaje->asunto) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tipo de solicitud</label>
                    <select class="form-select" name="tipo" required>
                        <option value="Queja"
                            {{ old('tipo', $mensaje->tipo) == 'Queja' ? 'selected' : '' }}>Queja</option>
                        <option value="Petición"
                            {{ old('tipo', $mensaje->tipo) == 'Petición' ? 'selected' : '' }}>Petición</option>
                        <option value="Felicitaciones"
                            {{ old('tipo', $mensaje->tipo) == 'Felicitaciones' ? 'selected' : '' }}>Felicitaciones</option>
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Mensaje</label>
                    <textarea name="mensaje" class="form-control" rows="5" required>{{ old('mensaje', $mensaje->mensaje) }}</textarea>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="acepto" name="acepto"
                            {{ old('acepto', $mensaje->acepto) ? 'checked' : '' }} required>
                        <label class="form-check-label" for="acepto">
                            El usuario aceptó los <a href="#" class="text-warning fw-semibold">términos y condiciones</a>
                        </label>
                    </div>
                </div>

                <div class="col-12 d-flex gap-2 justify-content-end mt-3">
                    <a href="{{ route('registros') }}" class="btn btn-cancelar">
                        <i class="bi bi-x-lg"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-guardar">
                        <i class="bi bi-check-lg"></i> Guardar cambios
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection