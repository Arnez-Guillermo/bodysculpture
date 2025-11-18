<div class="card h-100 shadow-lg border-0 hover-lift overflow-hidden" style="border-radius: 12px;">
    <div class="position-relative">
        @if($product->images->count() > 0)
            <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" 
                 class="card-img-top" 
                 alt="{{ $product->images->first()->alt_text ?? $product->name }}"
                 style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
        @else
            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
            </div>
        @endif
        @if($product->compare_price && $product->compare_price > $product->price)
            <span class="badge bg-danger position-absolute top-0 end-0 m-2">-{{ $product->discount_percentage }}%</span>
        @endif
        @if($product->is_featured)
            <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">
                <i class="bi bi-star-fill"></i> Destacado
            </span>
        @endif
    </div>
    
    <div class="card-body d-flex flex-column p-4">
        @if($product->brand)
            <small class="text-muted text-uppercase mb-1">{{ $product->brand->name }}</small>
        @endif
        <h5 class="card-title fw-bold mb-2">{{ $product->name }}</h5>
        <p class="card-text text-muted small mb-3">{{ \Illuminate\Support\Str::limit($product->short_description ?? $product->description, 80) }}</p>
        
        <div class="mt-auto">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <span class="h4 text-primary fw-bold mb-0">${{ number_format($product->price, 2) }}</span>
                    @if($product->compare_price && $product->compare_price > $product->price)
                        <div>
                            <small class="text-muted text-decoration-line-through">${{ number_format($product->compare_price, 2) }}</small>
                        </div>
                    @endif
                </div>
                <div>
                    @if($product->stock > 0)
                        <span class="badge bg-success">
                            <i class="bi bi-check-circle"></i> En stock
                        </span>
                    @else
                        <span class="badge bg-danger">
                            <i class="bi bi-x-circle"></i> Sin stock
                        </span>
                    @endif
                </div>
            </div>
            
            <a href="{{ route('product.show', $product->slug) }}" class="btn btn-primary w-100 fw-semibold">
                <i class="bi bi-eye me-2"></i>Ver Detalle
            </a>
        </div>
    </div>
</div>

