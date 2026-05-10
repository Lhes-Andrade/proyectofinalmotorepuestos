@extends('layouts.public')

@section('titulo', 'Inicio - Primer Semestre')

@section('contenido')
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiKjAXKghZzgtishQfV_gHvacTYH3MU-TgOA&s" class="border p-2 d-block w-75 mx-auto rounded-5" alt="motoRepuestos">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="bg-dark text-white py-2 w-50 mx-auto">¡Encuentra TODOS tus repuestos!</h5>
                    <p class="bg-body text-black py-2">Encuentra el repuesto que necesitas con facilidad.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://reinspirit.com/wp-content/uploads/2017/02/localizador-de-tiendas.jpg" class="border p-2 d-block w-75 mx-auto rounded-5" alt="mapaTiendas">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="bg-dark text-white py-2 w-50 mx-auto">Ubicaciones en tiempo real</h5>
                    <p class="bg-body text-black py-2">Encuentra tiendas que tienen tus repuestos en pocos clic's.</p>
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
@endsection