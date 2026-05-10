@extends('layouts.public')

@section('titulo', 'Productos - MotoRepuestos')

@section('contenido')
    {{-- Estilos específicos de esta página --}}
    <style>
        .productos-header {
            background: linear-gradient(135deg, #1b1b18 0%, #f53003 100%);
            color: white;
            padding: 3rem 1rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .productos-header h1 {
            font-weight: 800;
            margin: 0;
        }

        .productos-header p {
            opacity: 0.9;
            margin: 0.5rem 0 0;
        }

        /* Tarjetas de producto */
        .producto-card {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .producto-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
        }

        .producto-card .card-img-top {
            height: 220px;
            object-fit: contain;
            background: #f8f9fa;
            padding: 1rem;
        }

        .producto-card .card-title {
            font-weight: 700;
            color: #1b1b18;
        }

        .producto-card .precio {
            color: #f53003;
            font-weight: 800;
            font-size: 1.4rem;
        }

        .btn-comprar {
            background-color: #f53003;
            border-color: #f53003;
            color: white;
            border-radius: 50px;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .btn-comprar:hover {
            background-color: #d12902;
            border-color: #d12902;
            color: white;
        }

        /* Botón de solicitud personalizada */
        .btn-personalizar {
            background: linear-gradient(135deg, #f53003 0%, #ff6b35 100%);
            border: none;
            color: white;
            border-radius: 50px;
            padding: 0.7rem 2rem;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(245, 48, 3, 0.3);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-personalizar:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(245, 48, 3, 0.45);
        }

        /* Tarjeta del formulario */
        .form-card {
            border: none;
            border-radius: 1rem;
            border-top: 4px solid #f53003;
        }

        .form-card h4 {
            color: #1b1b18;
            font-weight: 700;
        }

        .form-card .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-card .form-control:focus {
            border-color: #f53003;
            box-shadow: 0 0 0 0.2rem rgba(245, 48, 3, 0.15);
        }

        .form-card .btn-primary {
            background-color: #f53003;
            border-color: #f53003;
            border-radius: 50px;
            padding: 0.5rem 2rem;
            font-weight: 600;
        }

        .form-card .btn-primary:hover {
            background-color: #d12902;
            border-color: #d12902;
        }
    </style>

    {{-- ================= ENCABEZADO ================= --}}
    <div class="productos-header">
        <h1><i class="bi bi-box-seam"></i> Nuestros Productos</h1>
        <p>Descubre nuestro catálogo de repuestos originales y compatibles</p>
    </div>

    {{-- ================= BOTÓN PARA SOLICITUD PERSONALIZADA ================= --}}
    <div class="text-center mb-4">
        <button class="btn btn-personalizar" type="button" data-bs-toggle="collapse" data-bs-target="#formularioPersonalizado">
            <i class="bi bi-tools"></i> Solicitar producto personalizado
        </button>
    </div>

    {{-- ================= FORMULARIO DESPLEGABLE ================= --}}
    <div class="collapse mb-5" id="formularioPersonalizado">
        <div class="card form-card shadow-sm">
            <div class="card-body p-4">
                <h4 class="mb-3">
                    <i class="bi bi-pencil-square"></i> Solicitud de Repuesto Personalizado
                </h4>
                <p class="text-muted mb-4">Cuéntanos qué necesitas y te contactaremos lo antes posible.</p>

                <form action="{{ route('solicitud.guardar') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre completo</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ej: Juan Pérez" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" name="correo" class="form-control" placeholder="ejemplo@gmail.com" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" name="telefono" class="form-control" placeholder="3001234567" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Marca de la moto</label>
                            <input type="text" name="marca" class="form-control" placeholder="Ej: Yamaha, Honda..." required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Modelo</label>
                            <input type="text" name="modelo" class="form-control" placeholder="Ej: FZ 2.0" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Año</label>
                            <input type="number" name="anio" class="form-control" placeholder="Ej: 2022" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Descripción del repuesto</label>
                            <textarea name="descripcion" class="form-control" rows="3" placeholder="Describe el repuesto que necesitas..." required></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Subir imagen (opcional)</label>
                            <input type="file" name="imagen" class="form-control">
                        </div>

                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send"></i> Enviar solicitud
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ================= LISTA DE PRODUCTOS ================= --}}
    <div class="row g-4">

        {{-- Producto 1 --}}
        <div class="col-md-6 col-lg-4">
            <div class="card producto-card shadow-sm">
                <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTp5T0EkMvAs47frD980mFKHe_WkDWJc7f5iYl3cwuMB9_tXnY6"
                    class="card-img-top" alt="Producto 1">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Producto 1</h5>
                    <p class="card-text text-muted">Descripción breve del producto. Ideal para clientes exigentes.</p>
                    <div class="precio mb-3">$25.00</div>
                    <a href="#" class="btn btn-comprar mt-auto">
                        <i class="bi bi-cart-plus"></i> Comprar
                    </a>
                </div>
            </div>
        </div>

        {{-- Producto 2 --}}
        <div class="col-md-6 col-lg-4">
            <div class="card producto-card shadow-sm">
                <img src="https://redplas.co/wp-content/uploads/2024/07/CEF1003.jpg"
                    class="card-img-top" alt="Producto 2">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Producto 2</h5>
                    <p class="card-text text-muted">Producto de alta calidad con excelentes características.</p>
                    <div class="precio mb-3">$40.00</div>
                    <a href="#" class="btn btn-comprar mt-auto">
                        <i class="bi bi-cart-plus"></i> Comprar
                    </a>
                </div>
            </div>
        </div>

        {{-- Producto 3 --}}
        <div class="col-md-6 col-lg-4">
            <div class="card producto-card shadow-sm">
                <img src="https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?w=600&auto=format&fit=crop"
                    class="card-img-top" alt="Producto 3">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Producto 3</h5>
                    <p class="card-text text-muted">Perfecto para uso diario y necesidades profesionales.</p>
                    <div class="precio mb-3">$60.00</div>
                    <a href="#" class="btn btn-comprar mt-auto">
                        <i class="bi bi-cart-plus"></i> Comprar
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection