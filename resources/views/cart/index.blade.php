@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
<div class="container my-5">
    <h1>Carrito de Compras</h1>

    @if($cart->items->count() > 0)
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->items as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($item->product->images->count() > 0)
                                            <img src="{{ asset('storage/' . $item->product->images->first()->image_path) }}" 
                                                 alt="{{ $item->product->name }}" 
                                                 class="me-3" 
                                                 style="width: 80px; height: 80px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $item->product->name }}</h6>
                                            <small class="text-muted">SKU: {{ $item->product->sku }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $item) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" 
                                               name="quantity" 
                                               value="{{ $item->quantity }}" 
                                               min="1" 
                                               max="{{ $item->product->stock }}"
                                               class="form-control form-control-sm d-inline-block" 
                                               style="width: 80px;"
                                               onchange="this.form.submit()">
                                    </form>
                                </td>
                                <td>${{ number_format($item->subtotal, 2) }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $item) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este producto del carrito?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between">
                    <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Vaciar todo el carrito?')">
                            Vaciar Carrito
                        </button>
                    </form>
                    <a href="{{ route('catalog.index') }}" class="btn btn-outline-primary">
                        Continuar Comprando
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Resumen del Pedido</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span>${{ number_format($cart->total, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>IVA (21%):</span>
                            <span>${{ number_format($cart->total * 0.21, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Envío:</span>
                            <span>Gratis</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <strong>Total:</strong>
                            <strong>${{ number_format($cart->total * 1.21, 2) }}</strong>
                        </div>
                        @auth
                            <a href="{{ route('checkout.index') }}" class="btn btn-primary w-100">
                                Proceder al Checkout
                            </a>
                        @else
                            <p class="text-muted small mb-2">Debes iniciar sesión para continuar</p>
                            <a href="{{ route('login') }}" class="btn btn-primary w-100">
                                Iniciar Sesión
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            <p class="mb-0">Tu carrito está vacío.</p>
        </div>
        <a href="{{ route('catalog.index') }}" class="btn btn-primary">
            Ver Catálogo
        </a>
    @endif
</div>
@endsection

