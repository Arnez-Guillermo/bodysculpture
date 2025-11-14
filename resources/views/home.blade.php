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
    @php
        $categories = \App\Models\Category::active()->whereNull('parent_id')->limit(4)->get();
    @endphp
    
    @if($categories->count() > 0)
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-4">Categorías</h2>
            </div>
            @foreach($categories as $category)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">{{ $category->description ?? 'Productos de calidad' }}</p>
                            <a href="{{ route('catalog.category', $category->slug) }}" class="btn btn-primary">Ver Productos</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Productos Destacados -->
    @if(isset($featuredProducts) && $featuredProducts->count() > 0)
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

