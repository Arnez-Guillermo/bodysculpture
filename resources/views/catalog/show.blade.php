@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('catalog.index') }}">Catálogo</a></li>
            @if($product->category)
                <li class="breadcrumb-item"><a href="{{ route('catalog.category', $product->category->slug) }}">{{ $product->category->name }}</a></li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Galería de Imágenes -->
        <div class="col-md-6">
            @if($product->images->count() > 0)
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($product->images as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image->image_path) }}" 
                                     class="d-block w-100" 
                                     alt="{{ $image->alt_text ?? $product->name }}"
                                     style="max-height: 500px; object-fit: contain;">
                            </div>
                        @endforeach
                    </div>
                    @if($product->images->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    @endif
                </div>
            @else
                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 500px;">
                    <span class="text-muted">Sin imagen</span>
                </div>
            @endif
        </div>

        <!-- Información del Producto -->
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p class="text-muted">SKU: {{ $product->sku }}</p>
            
            <div class="mb-3">
                <span class="h3 text-primary">${{ number_format($product->price, 2) }}</span>
                @if($product->compare_price && $product->compare_price > $product->price)
                    <span class="text-muted text-decoration-line-through ms-2">${{ number_format($product->compare_price, 2) }}</span>
                    <span class="badge bg-danger ms-2">-{{ $product->discount_percentage }}%</span>
                @endif
            </div>

            <div class="mb-3">
                @if($product->stock > 0)
                    <span class="badge bg-success fs-6">En stock ({{ $product->stock }} unidades)</span>
                @else
                    <span class="badge bg-danger fs-6">Sin stock</span>
                @endif
            </div>

            <div class="mb-4">
                <p>{{ $product->description }}</p>
            </div>

            @if($product->stock > 0)
                <form action="{{ route('cart.add') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="quantity" class="form-label">Cantidad</label>
                            <input type="number" 
                                   class="form-control" 
                                   id="quantity" 
                                   name="quantity" 
                                   value="1" 
                                   min="1" 
                                   max="{{ $product->stock }}" 
                                   required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        Agregar al Carrito
                    </button>
                </form>
            @else
                <button class="btn btn-secondary btn-lg w-100" disabled>
                    Producto no disponible
                </button>
            @endif

            <div class="mt-4">
                <h5>Información adicional</h5>
                <ul class="list-unstyled">
                    @if($product->category)
                        <li><strong>Categoría:</strong> {{ $product->category->name }}</li>
                    @endif
                    @if($product->brand)
                        <li><strong>Marca:</strong> {{ $product->brand->name }}</li>
                    @endif
                    <li><strong>Nivel:</strong> {{ $product->level === 'home' ? 'Hogar' : 'Profesional' }}</li>
                    @if($product->weight)
                        <li><strong>Peso:</strong> {{ $product->weight }} kg</li>
                    @endif
                    @if($product->dimensions)
                        <li><strong>Dimensiones:</strong> {{ $product->dimensions }}</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- Ficha Técnica -->
    @if($product->specifications->count() > 0)
        <div class="row mt-5">
            <div class="col-12">
                <h3>Ficha Técnica</h3>
                <table class="table table-striped">
                    <tbody>
                        @foreach($product->specifications as $spec)
                            <tr>
                                <th style="width: 30%;">{{ $spec->spec_key }}</th>
                                <td>{{ $spec->spec_value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <!-- Productos Relacionados -->
    @if($relatedProducts->count() > 0)
        <div class="row mt-5">
            <div class="col-12">
                <h3>Productos Relacionados</h3>
                <div class="row">
                    @foreach($relatedProducts as $relatedProduct)
                        <div class="col-md-3 mb-4">
                            @include('components.product-card', ['product' => $relatedProduct])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

