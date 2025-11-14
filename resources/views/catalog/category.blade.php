@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container my-5">
    <h1>{{ $category->name }}</h1>
    @if($category->description)
        <p class="text-muted">{{ $category->description }}</p>
    @endif

    <div class="row mt-4">
        @forelse($products as $product)
            <div class="col-md-3 mb-4">
                @include('components.product-card', ['product' => $product])
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No hay productos en esta categoría.
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
@endsection

