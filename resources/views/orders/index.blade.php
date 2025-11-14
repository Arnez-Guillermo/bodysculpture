@extends('layouts.app')

@section('title', 'Mis Pedidos')

@section('content')
<div class="container my-5">
    <h1>Mis Pedidos</h1>

    @if($orders->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Número de Pedido</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td>
                                @if($order->status === 'pending')
                                    <span class="badge bg-warning">Pendiente</span>
                                @elseif($order->status === 'paid')
                                    <span class="badge bg-info">Pagado</span>
                                @elseif($order->status === 'shipped')
                                    <span class="badge bg-primary">Enviado</span>
                                @elseif($order->status === 'completed')
                                    <span class="badge bg-success">Completado</span>
                                @elseif($order->status === 'cancelled')
                                    <span class="badge bg-danger">Cancelado</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-primary">
                                    Ver Detalle
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $orders->links() }}
        </div>
    @else
        <div class="alert alert-info">
            <p class="mb-0">No tienes pedidos aún.</p>
        </div>
        <a href="{{ route('catalog.index') }}" class="btn btn-primary">
            Ver Catálogo
        </a>
    @endif
</div>
@endsection

