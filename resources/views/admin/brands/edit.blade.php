@extends('admin.layouts.app')

@section('title', 'Editar Marca')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Marca</h1>
</div>

<form action="{{ route('admin.brands.update', $brand) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nombre *</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $brand->name) }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $brand->is_active) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">
                Activa
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar Marca</button>
    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

