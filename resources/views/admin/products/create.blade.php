@extends('admin.layouts.app')

@section('title', 'Nuevo Producto')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Nuevo Producto</h1>
</div>

<form action="{{ route('admin.products.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Nombre *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="sku" class="form-label">SKU *</label>
            <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku') }}" required>
            @error('sku')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descripción *</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="short_description" class="form-label">Descripción Corta</label>
        <textarea class="form-control" id="short_description" name="short_description" rows="2">{{ old('short_description') }}</textarea>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="price" class="form-label">Precio *</label>
            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="compare_price" class="form-label">Precio Comparación</label>
            <input type="number" step="0.01" class="form-control" id="compare_price" name="compare_price" value="{{ old('compare_price') }}">
        </div>

        <div class="col-md-4 mb-3">
            <label for="level" class="form-label">Nivel *</label>
            <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
                <option value="home" {{ old('level') == 'home' ? 'selected' : '' }}>Hogar</option>
                <option value="professional" {{ old('level') == 'professional' ? 'selected' : '' }}>Profesional</option>
            </select>
            @error('level')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="category_id" class="form-label">Categoría *</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                <option value="">Seleccionar...</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="brand_id" class="form-label">Marca</label>
            <select class="form-select" id="brand_id" name="brand_id">
                <option value="">Seleccionar...</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="stock" class="form-label">Stock *</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', 0) }}" required>
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="min_stock" class="form-label">Stock Mínimo *</label>
            <input type="number" class="form-control @error('min_stock') is-invalid @enderror" id="min_stock" name="min_stock" value="{{ old('min_stock', 5) }}" required>
            @error('min_stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="weight" class="form-label">Peso (kg)</label>
            <input type="number" step="0.01" class="form-control" id="weight" name="weight" value="{{ old('weight') }}">
        </div>
    </div>

    <div class="mb-3">
        <label for="dimensions" class="form-label">Dimensiones</label>
        <input type="text" class="form-control" id="dimensions" name="dimensions" value="{{ old('dimensions') }}" placeholder="LxAxP">
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">
                Activo
            </label>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
            <label class="form-check-label" for="is_featured">
                Destacado
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Crear Producto</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

