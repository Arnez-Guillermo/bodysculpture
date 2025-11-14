@extends('admin.layouts.app')

@section('title', 'Detalle del Pedido')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pedido: {{ $order->order_number }}</h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
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
                                    <strong>{{ $item->product_name }}</strong><br>
                                    <small class="text-muted">SKU: {{ $item->product_sku }}</small>
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
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Información del Pedido</h5>
            </div>
            <div class="card-body">
                <p><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Cliente:</strong> {{ $order->customer_name }}</p>
                <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                <p><strong>Teléfono:</strong> {{ $order->customer_phone }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Dirección de Envío</h5>
            </div>
            <div class="card-body">
                <p>{{ $order->shipping_address }}</p>
                <p>{{ $order->shipping_city }}, {{ $order->shipping_postal_code }}</p>
            </div>
        </div>

        <div class="card mb-4">
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

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Cambiar Estado</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.orders.update-status', $order) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <select name="status" class="form-select">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                            <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>Pagado</option>
                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Enviado</option>
                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completado</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Actualizar Estado</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Volver a Pedidos</a>
</div>
@endsection

