@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="container my-5">
    <!-- Hero Section -->
    <div class="jumbotron bg-light p-5 rounded mb-5">
        <h1 class="display-4">Bienvenido a BodySculpture</h1>
        <p class="lead">Tu tienda de confianza para artículos fitness de calidad profesional y para el hogar.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('catalog.index') }}" role="button">Ver Catálogo</a>
    </div>

    <!-- Categorías Destacadas -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="mb-4">Categorías</h2>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Bicicletas</h5>
                    <p class="card-text">Bicicletas fijas y de spinning</p>
                    <a href="{{ route('catalog.index', ['category' => 1]) }}" class="btn btn-primary">Ver Productos</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Pesas</h5>
                    <p class="card-text">Pesas, mancuernas y barras</p>
                    <a href="{{ route('catalog.index', ['category' => 2]) }}" class="btn btn-primary">Ver Productos</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Máquinas</h5>
                    <p class="card-text">Equipos de gimnasio profesionales</p>
                    <a href="{{ route('catalog.index', ['category' => 3]) }}" class="btn btn-primary">Ver Productos</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Accesorios</h5>
                    <p class="card-text">Bandas, colchonetas, guantes y más</p>
                    <a href="{{ route('catalog.index', ['category' => 4]) }}" class="btn btn-primary">Ver Productos</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Productos Destacados -->
    @php
        $featuredProducts = \App\Models\Product::with(['category', 'brand', 'images'])
            ->featured()
            ->active()
            ->inStock()
            ->limit(4)
            ->get();
    @endphp

    @if($featuredProducts->count() > 0)
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Productos Destacados</h2>
            </div>
            @foreach($featuredProducts as $product)
                <div class="col-md-3 mb-4">
                    @include('components.product-card', ['product' => $product])
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

