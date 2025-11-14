@extends('admin.layouts.app')

@section('title', 'Nueva Categoría')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Nueva Categoría</h1>
</div>

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nombre *</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="parent_id" class="form-label">Categoría Padre</label>
        <select class="form-select" id="parent_id" name="parent_id">
            <option value="">Ninguna (Categoría principal)</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('parent_id') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">
                Activa
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Crear Categoría</button>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

