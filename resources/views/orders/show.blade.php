@extends('layouts.app')

@section('title', 'Detalle del Pedido')

@section('content')
<div class="container my-5">
    <h1>Detalle del Pedido</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Información del Pedido</h5>
                </div>
                <div class="card-body">
                    <p><strong>Número de Pedido:</strong> {{ $order->order_number }}</p>
                    <p><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Estado:</strong> 
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
                    </p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Productos</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>
                                        <div>
                                            <strong>{{ $item->product_name }}</strong><br>
                                            <small class="text-muted">SKU: {{ $item->product_sku }}</small>
                                        </div>
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>${{ number_format($item->subtotal, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Resumen</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span>${{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>IVA:</span>
                        <span>${{ number_format($order->tax, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Envío:</span>
                        <span>${{ number_format($order->shipping_cost, 2) }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Total:</strong>
                        <strong>${{ number_format($order->total, 2) }}</strong>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">Dirección de Envío</h5>
                </div>
                <div class="card-body">
                    <p class="mb-1"><strong>{{ $order->customer_name }}</strong></p>
                    <p class="mb-1">{{ $order->shipping_address }}</p>
                    <p class="mb-1">{{ $order->shipping_city }}, {{ $order->shipping_postal_code }}</p>
                    <p class="mb-0">{{ $order->customer_phone }}</p>
                    <p class="mb-0">{{ $order->customer_email }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">
            Volver a Mis Pedidos
        </a>
    </div>
</div>
@endsection

