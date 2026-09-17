@extends('layouts.public')

@section('titulo', 'Gestión de Usuarios - MotoRepuestos')

@section('contenido')
    <style>
        .usuarios-header {
            background: linear-gradient(135deg, #1b1b18 0%, #f53003 100%);
            color: white;
            padding: 3rem 1.5rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
        }

        .usuarios-header h1 {
            font-weight: 800;
            margin: 0;
        }

        .usuarios-header p {
            margin: 0.5rem 0 0;
            opacity: 0.9;
        }

        .filtro-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            margin-bottom: 1.5rem;
        }

        .tabla-usuarios {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
        }

        .tabla-usuarios thead {
            background-color: #1b1b18;
            color: white;
        }

        .select-rol {
            min-width: 160px;
        }

        .btn-filtrar {
            background-color: #f53003;
            border-color: #f53003;
            color: white;
        }

        .btn-filtrar:hover {
            background-color: #d12902;
            border-color: #d12902;
            color: white;
        }
    </style>

    {{-- ================= ENCABEZADO ================= --}}
    <div class="usuarios-header">
        <h1><i class="bi bi-people-fill"></i> Gestión de Usuarios</h1>
        <p>Filtra usuarios y administra sus roles dentro de la plataforma</p>
    </div>

    {{-- ================= MENSAJES ================= --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ================= FILTRO DE BÚSQUEDA ================= --}}
    <div class="card filtro-card">
        <div class="card-body p-4">
            <form action="{{ route('admin.usuarios') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-5">
                    <label class="form-label">Nombre de usuario</label>
                    <input type="text" name="nombre" class="form-control"
                        value="{{ request('nombre') }}" placeholder="Buscar por nombre...">
                </div>
                <div class="col-md-5">
                    <label class="form-label">Correo electrónico</label>
                    <input type="text" name="correo" class="form-control"
                        value="{{ request('correo') }}" placeholder="Buscar por correo...">
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-filtrar">
                        <i class="bi bi-search"></i> Filtrar
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ================= TABLA DE USUARIOS ================= --}}
    <div class="table-responsive tabla-usuarios">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Rol actual</th>
                    <th>Registrado</th>
                    <th style="width: 280px;">Cambiar rol</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <span class="badge {{ $usuario->role->badgeClass() }}">
                                {{ $usuario->role->label() }}
                            </span>
                        </td>
                        <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                        <td>
                            @if ($usuario->id === auth()->id())
                                <span class="text-muted small">
                                    <i class="bi bi-info-circle"></i> No puedes editar tu propio rol
                                </span>
                            @else
                                <form action="{{ route('admin.usuarios.actualizar', $usuario) }}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    @method('PUT')
                                    <select name="role" class="form-select form-select-sm select-rol">
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->value }}" {{ $usuario->role === $rol ? 'selected' : '' }}>
                                                {{ $rol->label() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-outline-dark">
                                        <i class="bi bi-check2"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            No se encontraron usuarios con esos filtros.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- ================= PAGINACIÓN ================= --}}
    <div class="mt-4">
        {{ $usuarios->links('pagination::bootstrap-5') }}
    </div>
@endsection
