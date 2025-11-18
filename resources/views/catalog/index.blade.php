@extends('layouts.app')

@section('title', 'Catálogo de Productos')

@section('content')
<div class="container my-5">
    <!-- Header del Catálogo -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold mb-3">Catálogo de Productos</h1>
            <p class="text-muted">Encuentra el equipo perfecto para tu entrenamiento</p>
        </div>
    </div>

    <div class="row">
        <!-- Sidebar de Filtros -->
        <div class="col-md-3 mb-4">
            @include('components.filter-sidebar')
        </div>

        <!-- Listado de Productos -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="text-muted">Mostrando {{ $products->total() }} productos</span>
                </div>
                <div>
                    <form method="GET" action="{{ route('catalog.index') }}" class="d-inline">
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        <input type="hidden" name="brand" value="{{ request('brand') }}">
                        <input type="hidden" name="level" value="{{ request('level') }}">
                        <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                        <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <select name="sort" class="form-select form-select-sm" onchange="this.form.submit()" style="width: auto; display: inline-block;">
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nombre A-Z</option>
                            <option value="price" {{ request('sort') == 'price' && request('direction') != 'desc' ? 'selected' : '' }}>Precio: Menor a Mayor</option>
                            <option value="price_desc" {{ request('sort') == 'price' && request('direction') == 'desc' ? 'selected' : '' }}>Precio: Mayor a Menor</option>
                            <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Más Recientes</option>
                        </select>
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
                <div class="alert alert-info text-center py-5">
                    <i class="bi bi-info-circle fs-1 d-block mb-3"></i>
                    <h5>No se encontraron productos</h5>
                    <p class="mb-0">Intenta ajustar los filtros de búsqueda.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

