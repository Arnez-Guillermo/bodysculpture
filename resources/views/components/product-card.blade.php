<div class="card h-100 shadow-sm">
    @if($product->images->count() > 0)
        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" 
             class="card-img-top" 
             alt="{{ $product->images->first()->alt_text ?? $product->name }}"
             style="height: 200px; object-fit: cover;">
    @else
        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
            <span class="text-muted">Sin imagen</span>
        </div>
    @endif
    
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text text-muted small">{{ \Illuminate\Support\Str::limit($product->short_description ?? $product->description, 100) }}</p>
        
        <div class="mt-auto">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div>
                    <span class="h5 text-primary mb-0">${{ number_format($product->price, 2) }}</span>
                    @if($product->compare_price && $product->compare_price > $product->price)
                        <span class="text-muted text-decoration-line-through ms-2">${{ number_format($product->compare_price, 2) }}</span>
                        <span class="badge bg-danger ms-2">-{{ $product->discount_percentage }}%</span>
                    @endif
                </div>
            </div>
            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <small class="text-muted">
                    @if($product->stock > 0)
                        <span class="badge bg-success">En stock</span>
                    @else
                        <span class="badge bg-danger">Sin stock</span>
                    @endif
                </small>
                @if($product->brand)
                    <small class="text-muted">{{ $product->brand->name }}</small>
                @endif
            </div>
            
            <a href="{{ route('product.show', $product->slug) }}" class="btn btn-primary w-100">
                Ver Detalle
            </a>
        </div>
    </div>
</div>

