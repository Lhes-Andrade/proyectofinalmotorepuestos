@extends('layouts.public')

@section('titulo', 'Informe de Ventas - MotoRepuestos')

@section('contenido')
    {{-- Estilos específicos de esta página --}}
    <style>
        .ventas-header {
            background: linear-gradient(135deg, #14803c 0%, #1e9e4e 50%, #1b1b18 100%);
            color: white;
            padding: 3rem 1.5rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
        }

        .ventas-header h1 {
            font-weight: 800;
            margin: 0;
        }

        .ventas-header p {
            opacity: 0.9;
            margin: 0.5rem 0 0;
            font-size: 1.05rem;
        }

        /* Tarjetas de métricas */
        .metric-card {
            background: white;
            border: none;
            border-radius: 1rem;
            border-left: 5px solid #1e9e4e;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.12);
        }

        .metric-card .metric-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #d4f5df;
            color: #14803c;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 1rem;
        }

        .metric-card h6 {
            color: #888;
            font-weight: 500;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .metric-card h4 {
            font-weight: 800;
            color: #1b1b18;
            margin-bottom: 0.5rem;
        }

        .metric-card .trend-up {
            color: #1e9e4e;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .metric-card .trend-neutral {
            color: #888;
            font-size: 0.85rem;
        }

        /* Tarjeta de sección general */
        .section-card {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .section-titulo {
            font-weight: 700;
            color: #1b1b18;
            margin-bottom: 1.25rem;
            position: relative;
            padding-bottom: 0.6rem;
            display: inline-block;
        }

        .section-titulo::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #1e9e4e;
            border-radius: 2px;
        }

        /* Tabla de ventas */
        .table-ventas {
            margin: 0;
        }

        .table-ventas thead {
            background: linear-gradient(135deg, #14803c 0%, #1e9e4e 100%);
            color: white;
        }

        .table-ventas thead th {
            font-weight: 600;
            border: none;
            padding: 1rem;
        }

        .table-ventas tbody tr {
            transition: background-color 0.2s;
        }

        .table-ventas tbody tr:hover {
            background-color: #f0faf3;
        }

        .table-ventas tbody td {
            padding: 0.85rem 1rem;
            vertical-align: middle;
        }

        /* Lista de observaciones */
        .observacion-item {
            display: flex;
            align-items: start;
            gap: 1rem;
            padding: 1rem;
            border-radius: 0.75rem;
            background: #f0faf3;
            margin-bottom: 1rem;
        }

        .observacion-item:last-child {
            margin-bottom: 0;
        }

        .observacion-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #1e9e4e;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1rem;
        }

        .observacion-item p {
            margin: 0;
            color: #333;
            line-height: 1.5;
        }
    </style>

    {{-- ================= ENCABEZADO ================= --}}
    <div class="ventas-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1><i class="bi bi-graph-up-arrow"></i> Informe de Ventas 2026</h1>
                <p>Resumen general del desempeño comercial</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <span class="badge bg-light text-dark px-3 py-2">
                    <i class="bi bi-calendar-event"></i> Actualizado: {{ date('d/m/Y') }}
                </span>
            </div>
        </div>
    </div>

    {{-- ================= MÉTRICAS PRINCIPALES ================= --}}
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card metric-card">
                <div class="card-body">
                    <div class="metric-icon">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <h6>Ventas Totales</h6>
                    <h4>$120,000</h4>
                    <span class="trend-up">
                        <i class="bi bi-arrow-up-right"></i> 12% vs año anterior
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card metric-card">
                <div class="card-body">
                    <div class="metric-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h6>Clientes Nuevos</h6>
                    <h4>320</h4>
                    <span class="trend-up">
                        <i class="bi bi-arrow-up-right"></i> 8% crecimiento
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card metric-card">
                <div class="card-body">
                    <div class="metric-icon">
                        <i class="bi bi-trophy-fill"></i>
                    </div>
                    <h6>Producto Más Vendido</h6>
                    <h4>Producto A</h4>
                    <span class="trend-neutral">
                        <i class="bi bi-bar-chart-fill"></i> 35% del total
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card metric-card">
                <div class="card-body">
                    <div class="metric-icon">
                        <i class="bi bi-percent"></i>
                    </div>
                    <h6>Margen de Ganancia</h6>
                    <h4>28%</h4>
                    <span class="trend-up">
                        <i class="bi bi-arrow-up-right"></i> 3% mejora
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= RESUMEN EJECUTIVO ================= --}}
    <div class="section-card">
        <h4 class="section-titulo">
            <i class="bi bi-clipboard-data text-success"></i> Resumen Ejecutivo
        </h4>
        <p class="mb-0">
            Durante el año 2026, la empresa mostró un crecimiento sostenido en ventas,
            impulsado principalmente por la expansión del mercado digital y la fidelización
            de clientes recurrentes. Se observó un aumento significativo en el margen de ganancia
            debido a la optimización de costos operativos.
        </p>
    </div>

    {{-- ================= TABLA DE VENTAS ================= --}}
    <div class="section-card">
        <h4 class="section-titulo">
            <i class="bi bi-table text-success"></i> Detalle de Ventas por Trimestre
        </h4>
        <div class="table-responsive">
            <table class="table table-ventas">
                <thead>
                    <tr>
                        <th>Trimestre</th>
                        <th>Ventas</th>
                        <th>Gastos</th>
                        <th>Ganancia</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Q1</strong></td>
                        <td>$25,000</td>
                        <td>$15,000</td>
                        <td class="text-success fw-bold">$10,000</td>
                    </tr>
                    <tr>
                        <td><strong>Q2</strong></td>
                        <td>$30,000</td>
                        <td>$17,000</td>
                        <td class="text-success fw-bold">$13,000</td>
                    </tr>
                    <tr>
                        <td><strong>Q3</strong></td>
                        <td>$32,000</td>
                        <td>$18,000</td>
                        <td class="text-success fw-bold">$14,000</td>
                    </tr>
                    <tr>
                        <td><strong>Q4</strong></td>
                        <td>$33,000</td>
                        <td>$19,000</td>
                        <td class="text-success fw-bold">$14,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- ================= OBSERVACIONES ================= --}}
    <div class="section-card">
        <h4 class="section-titulo">
            <i class="bi bi-lightbulb-fill text-success"></i> Observaciones Finales
        </h4>

        <div class="observacion-item">
            <div class="observacion-icon">
                <i class="bi bi-check-lg"></i>
            </div>
            <p>Crecimiento constante durante todo el año, con un repunte notable en el segundo semestre.</p>
        </div>

        <div class="observacion-item">
            <div class="observacion-icon">
                <i class="bi bi-check-lg"></i>
            </div>
            <p>Incremento en captación de nuevos clientes, principalmente a través del canal digital.</p>
        </div>

        <div class="observacion-item">
            <div class="observacion-icon">
                <i class="bi bi-check-lg"></i>
            </div>
            <p>Se recomienda aumentar la inversión en marketing digital para mantener la tendencia de crecimiento.</p>
        </div>
    </div>
@endsection