@extends('layouts.public')

@section('titulo', 'Registros - MotoRepuestos')

@section('contenido')
    {{-- Estilos específicos de esta página --}}
    <style>
        .registros-header {
            background: linear-gradient(135deg, #d4a017 0%, #ffd700 100%);
            color: #1b1b18;
            padding: 3rem 1.5rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
        }

        .registros-header h1 {
            font-weight: 800;
            margin: 0;
        }

        .registros-header p {
            margin: 0.5rem 0 0;
            font-size: 1.05rem;
            opacity: 0.85;
        }

        /* Tarjeta de estadísticas */
        .stat-card {
            background: white;
            border: none;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            flex-shrink: 0;
        }

        .stat-icon.bg-total { background: linear-gradient(135deg, #1b1b18 0%, #3a2a1a 100%); }
        .stat-icon.bg-queja { background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%); }
        .stat-icon.bg-peticion { background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); }
        .stat-icon.bg-felicitacion { background: linear-gradient(135deg, #1e9e4e 0%, #14803c 100%); }

        .stat-card h3 {
            font-weight: 800;
            margin: 0;
            color: #1b1b18;
        }

        .stat-card .stat-label {
            margin: 0;
            color: #888;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Tarjeta de la tabla */
        .table-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .table-card-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #eee;
        }

        .table-card-header h4 {
            font-weight: 700;
            color: #1b1b18;
            margin: 0 0 0.25rem 0;
        }

        .table-card-header p {
            margin: 0;
            color: #888;
            font-size: 0.9rem;
        }

        /* Filtros */
        .filtros-bar {
            padding: 1rem 2rem;
            background: #f9f9f7;
            border-bottom: 1px solid #eee;
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            align-items: center;
        }

        .filtros-bar .form-control:focus,
        .filtros-bar .form-select:focus {
            border-color: #f53003;
            box-shadow: 0 0 0 0.2rem rgba(245, 48, 3, 0.15);
        }

        /* Tabla */
        .table-registros {
            margin: 0;
        }

        .table-registros thead {
            background: #1b1b18;
            color: white;
        }

        .table-registros thead th {
            font-weight: 600;
            border: none;
            padding: 1rem;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table-registros tbody tr {
            transition: background-color 0.2s;
        }

        .table-registros tbody tr:hover {
            background-color: #fff8f0;
        }

        .table-registros tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #f0f0f0;
        }

        .id-badge {
            background: #1b1b18;
            color: white;
            font-weight: 700;
            padding: 0.25rem 0.6rem;
            border-radius: 0.4rem;
            font-size: 0.85rem;
        }

        /* Badges por tipo */
        .badge-tipo {
            font-weight: 600;
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            font-size: 0.8rem;
        }

        .badge-tipo.queja { background: #fde2e4; color: #b02a37; }
        .badge-tipo.peticion { background: #d6e4ff; color: #0a58ca; }
        .badge-tipo.felicitaciones { background: #d4f5df; color: #14803c; }

        .mensaje-truncado {
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: help;
        }

        /* Botones de acciones */
        .btn-accion {
            width: 36px;
            height: 36px;
            border-radius: 0.5rem;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s, opacity 0.2s;
        }

        .btn-accion:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .btn-editar {
            background: #ffd700;
            color: #1b1b18;
        }

        .btn-eliminar {
            background: #dc3545;
            color: white;
        }

        /* Estado vacío */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #888;
        }

        .empty-state i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 1rem;
        }

        .empty-state h5 {
            color: #555;
            font-weight: 600;
        }
    </style>

    {{-- ================= ENCABEZADO ================= --}}
    <div class="registros-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1><i class="bi bi-journal-text"></i> Registros</h1>
                <p>Gestiona todas las solicitudes y mensajes recibidos a través del formulario de contacto</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <span class="badge bg-dark px-3 py-2">
                    <i class="bi bi-database"></i> Total: {{ count($mensajes) }} registros
                </span>
            </div>
        </div>
    </div>

    {{-- Mensaje de éxito tras editar/eliminar --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ================= ESTADÍSTICAS ================= --}}
    <div class="row g-3 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon bg-total">
                    <i class="bi bi-collection"></i>
                </div>
                <div>
                    <h3>{{ count($mensajes) }}</h3>
                    <p class="stat-label">Total</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon bg-queja">
                    <i class="bi bi-exclamation-circle-fill"></i>
                </div>
                <div>
                    <h3>{{ $mensajes->where('tipo', 'Queja')->count() }}</h3>
                    <p class="stat-label">Quejas</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon bg-peticion">
                    <i class="bi bi-question-circle-fill"></i>
                </div>
                <div>
                    <h3>{{ $mensajes->where('tipo', 'Petición')->count() }}</h3>
                    <p class="stat-label">Peticiones</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon bg-felicitacion">
                    <i class="bi bi-heart-fill"></i>
                </div>
                <div>
                    <h3>{{ $mensajes->where('tipo', 'Felicitaciones')->count() }}</h3>
                    <p class="stat-label">Felicitaciones</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= TABLA DE REGISTROS ================= --}}
    <div class="table-card">
        <div class="table-card-header">
            <h4><i class="bi bi-list-ul text-warning"></i> Listado de Registros</h4>
            <p>Mensajes ordenados del más reciente al más antiguo</p>
        </div>

        {{-- Filtros --}}
        <div class="filtros-bar">
            <div class="flex-grow-1" style="min-width: 200px;">
                <input type="text" id="buscador" class="form-control"
                    placeholder="🔍 Buscar por nombre, correo o asunto...">
            </div>
            <div style="min-width: 180px;">
                <select id="filtroTipo" class="form-select">
                    <option value="">Todos los tipos</option>
                    <option value="Queja">Quejas</option>
                    <option value="Petición">Peticiones</option>
                    <option value="Felicitaciones">Felicitaciones</option>
                </select>
            </div>
        </div>

        {{-- Tabla --}}
        <div class="table-responsive">
            <table class="table table-registros" id="tablaRegistros">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre completo</th>
                        <th>Correo</th>
                        <th>Tipo</th>
                        <th>Mensaje</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mensajes as $mensaje)
                        <tr data-tipo="{{ $mensaje->tipo }}">
                            <td><span class="id-badge">#{{ $mensaje->id }}</span></td>
                            <td>
                                <strong>{{ $mensaje->nombres }} {{ $mensaje->apellidos }}</strong>
                            </td>
                            <td>
                                <i class="bi bi-envelope text-muted"></i>
                                {{ $mensaje->correo }}
                            </td>
                            <td>
                                @if ($mensaje->tipo == 'Queja')
                                    <span class="badge-tipo queja">
                                        <i class="bi bi-exclamation-circle"></i> {{ $mensaje->tipo }}
                                    </span>
                                @elseif ($mensaje->tipo == 'Petición')
                                    <span class="badge-tipo peticion">
                                        <i class="bi bi-question-circle"></i> {{ $mensaje->tipo }}
                                    </span>
                                @else
                                    <span class="badge-tipo felicitaciones">
                                        <i class="bi bi-heart"></i> {{ $mensaje->tipo }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="mensaje-truncado" title="{{ $mensaje->mensaje }}">
                                    {{ $mensaje->mensaje }}
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('registros.edit', $mensaje->id) }}"
                                    class="btn-accion btn-editar" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('registros.destroy', $mensaje->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-accion btn-eliminar" title="Eliminar">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    <h5>Aún no hay registros</h5>
                                    <p>Cuando los usuarios envíen mensajes desde el formulario de contacto, aparecerán aquí.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Script de búsqueda y filtro --}}
    <script>
        const buscador = document.getElementById('buscador');
        const filtroTipo = document.getElementById('filtroTipo');
        const filas = document.querySelectorAll('#tablaRegistros tbody tr[data-tipo]');

        function filtrar() {
            const texto = buscador.value.toLowerCase();
            const tipo = filtroTipo.value;

            filas.forEach(fila => {
                const contenido = fila.textContent.toLowerCase();
                const tipoFila = fila.dataset.tipo;

                const coincideTexto = contenido.includes(texto);
                const coincideTipo = !tipo || tipoFila === tipo;

                fila.style.display = (coincideTexto && coincideTipo) ? '' : 'none';
            });
        }

        buscador.addEventListener('input', filtrar);
        filtroTipo.addEventListener('change', filtrar);
    </script>
@endsection