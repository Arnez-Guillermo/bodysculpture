@extends('admin.layouts.app')

@section('title', 'Marcas')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Marcas</h1>
    <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Nueva Marca</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Slug</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->slug }}</td>
                    <td>
                        <span class="badge bg-{{ $brand->is_active ? 'success' : 'secondary' }}">
                            {{ $brand->is_active ? 'Activa' : 'Inactiva' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.brands.edit', $brand) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta marca?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay marcas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $brands->links() }}
@endsection

