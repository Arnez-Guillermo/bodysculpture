@extends('layouts.app')

@section('title', 'Catálogo de Productos')

@section('content')
<!-- Header del Catálogo Compacto -->
<div class="catalog-header-compact py-3 mb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="catalog-header-content">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h1 class="h4 fw-bold mb-1 catalog-title-compact">
                                <i class="bi bi-grid-3x3-gap me-2 text-primary"></i>Catálogo de <span class="text-primary">Productos</span>
                            </h1>
                            <p class="small text-muted mb-0">
                                Encuentra el equipo perfecto para tu entrenamiento
                            </p>
                        </div>
                        <div class="catalog-stats-compact">
                            <span class="stat-number-compact">{{ $products->total() }}</span>
                            <span class="stat-label-compact">productos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">

    <div class="row">
        <!-- Sidebar de Filtros -->
        <div class="col-md-3 mb-4">
            @include('components.filter-sidebar')
        </div>

        <!-- Listado de Productos -->
        <div class="col-md-9">
            <div class="catalog-toolbar d-flex justify-content-between align-items-center mb-4 p-3 rounded">
                <div class="d-flex align-items-center">
                    <i class="bi bi-grid-3x3-gap me-2 text-primary"></i>
                    <span class="text-muted fw-medium">Mostrando <strong class="text-dark">{{ $products->total() }}</strong> productos</span>
                </div>
                <div>
                    <form method="GET" action="{{ route('catalog.index') }}" class="d-inline">
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        <input type="hidden" name="brand" value="{{ request('brand') }}">
                        <input type="hidden" name="level" value="{{ request('level') }}">
                        <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                        <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <div class="d-flex align-items-center">
                            <label class="me-2 mb-0 text-muted small">
                                <i class="bi bi-sort-down me-1"></i>Ordenar:
                            </label>
                            <select name="sort" class="form-select form-select-sm catalog-sort" onchange="this.form.submit()">
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nombre A-Z</option>
                                <option value="price" {{ request('sort') == 'price' && request('direction') != 'desc' ? 'selected' : '' }}>Precio: Menor a Mayor</option>
                                <option value="price_desc" {{ request('sort') == 'price' && request('direction') == 'desc' ? 'selected' : '' }}>Precio: Mayor a Menor</option>
                                <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Más Recientes</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            @if($products->count() > 0)
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-6 col-lg-4 mb-4">
                            @include('components.product-card', ['product' => $product])
                        </div>
                    @endforeach
                </div>

                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $products->links() }}
                </div>
            @else
                <div class="catalog-empty text-center py-5">
                    <div class="empty-icon mb-4">
                        <i class="bi bi-inbox"></i>
                    </div>
                    <h4 class="fw-bold mb-3">No se encontraron productos</h4>
                    <p class="text-muted mb-4">Intenta ajustar los filtros de búsqueda para encontrar lo que buscas.</p>
                    <a href="{{ route('catalog.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-counterclockwise me-2"></i>Limpiar Filtros
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

