@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<!-- Hero Section con Logo -->
<div class="bg-gradient-primary text-white py-5 mb-5 position-relative overflow-hidden">
    <div class="hero-pattern"></div>
    <div class="container position-relative">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="display-3 fw-bold mb-4 hero-title">
                        Transforma tu <span class="text-primary">Cuerpo</span>
                    </h1>
                    <p class="lead mb-4 hero-description" style="font-size: 1.2rem; line-height: 1.8;">
                        Tu tienda de confianza para artículos fitness de calidad profesional y para el hogar. Equipamiento de primera calidad para alcanzar tus objetivos.
                    </p>
                    <div class="d-flex gap-3 flex-wrap mt-4">
                        <a class="btn btn-primary btn-lg px-5 py-3 hero-btn-primary" href="{{ route('catalog.index') }}" role="button">
                            <i class="bi bi-grid me-2"></i>Ver Catálogo
                        </a>
                        <a class="btn btn-outline-light btn-lg px-5 py-3 hero-btn-secondary" href="{{ route('pages.about') }}" role="button">
                            <i class="bi bi-info-circle me-2"></i>Conoce Más
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                <div class="hero-logo-container">
                    <img src="{{ asset('img/body/logo-body-original.jpg') }}" 
                         alt="BODY ARGENTINA Logo" 
                         class="img-fluid hero-logo">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <!-- Categorías Destacadas -->
    @if(isset($categories) && $categories->count() > 0)
        <div class="row mb-5">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">Nuestras Categorías</h2>
                <p class="text-muted">Encuentra todo lo que necesitas para tu entrenamiento</p>
            </div>
            @foreach($categories as $category)
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow-lg border-0 hover-lift category-card" style="border-radius: 12px;">
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <div class="mb-4 flex-shrink-0">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 90px; height: 90px;">
                                    <i class="bi bi-heart-pulse text-primary" style="font-size: 2.5rem;"></i>
                                </div>
                            </div>
                            <h5 class="card-title fw-bold mb-3 flex-shrink-0" style="min-height: 3.5rem; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">{{ $category->name }}</h5>
                            <p class="card-text text-muted mb-4 flex-grow-1" style="min-height: 3.5rem; line-height: 1.6; font-size: 0.95rem;">{{ $category->description ?? 'Productos de calidad' }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('catalog.category', $category->slug) }}" class="btn btn-outline-primary w-100 fw-semibold" style="padding: 0.75rem;">
                                    Ver Productos <i class="bi bi-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Productos Destacados -->
    @if(isset($featuredProducts) && $featuredProducts->count() > 0)
        <div class="row mb-5">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">Productos Destacados</h2>
                <p class="text-muted">Los productos más populares de nuestra tienda</p>
            </div>
            @foreach($featuredProducts as $product)
                <div class="col-md-6 col-lg-3 mb-4">
                    @include('components.product-card', ['product' => $product])
                </div>
            @endforeach
        </div>
    @endif

    <!-- Call to Action -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="bg-dark text-white rounded-3 p-5 text-center">
                <h3 class="fw-bold mb-3">¿Listo para comenzar tu transformación?</h3>
                <p class="lead mb-4">Explora nuestro catálogo completo y encuentra el equipo perfecto para ti</p>
                <a href="{{ route('catalog.index') }}" class="btn btn-light btn-lg px-5">
                    Ver Todo el Catálogo <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

