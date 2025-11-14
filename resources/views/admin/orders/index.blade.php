@extends('admin.layouts.app')

@section('title', 'Pedidos')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pedidos</h1>
</div>

<form method="GET" action="{{ route('admin.orders.index') }}" class="mb-3">
    <div class="row">
        <div class="col-md-8">
            <input type="text" name="search" class="form-control" placeholder="Buscar por número, email o nombre..." value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <select name="status" class="form-select">
                <option value="">Todos los estados</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pendiente</option>
                <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Pagado</option>
                <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Enviado</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completado</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-secondary w-100">Buscar</button>
        </div>
    </div>
</form>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Número</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td><a href="{{ route('admin.orders.show', $order) }}">{{ $order->order_number }}</a></td>
                    <td>{{ $order->customer_name }}<br><small class="text-muted">{{ $order->customer_email }}</small></td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td>
                        <span class="badge bg-{{ $order->status === 'pending' ? 'warning' : ($order->status === 'completed' ? 'success' : ($order->status === 'cancelled' ? 'danger' : 'info')) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">Ver</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay pedidos</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $orders->links() }}
@endsection

