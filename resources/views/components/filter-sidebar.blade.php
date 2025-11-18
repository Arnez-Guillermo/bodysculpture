<div class="card filter-sidebar shadow-lg border-0">
    <div class="card-header filter-header">
        <h5 class="mb-0 d-flex align-items-center">
            <i class="bi bi-funnel me-2"></i>Filtros
        </h5>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('catalog.index') }}">
            <!-- Búsqueda -->
            <div class="mb-4">
                <label for="search" class="form-label fw-semibold">
                    <i class="bi bi-search me-1 text-primary"></i>Buscar
                </label>
                <input type="text" 
                       class="form-control filter-input" 
                       id="search" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Nombre, SKU...">
            </div>

            <!-- Categoría -->
            <div class="mb-4">
                <label for="category" class="form-label fw-semibold">
                    <i class="bi bi-tags me-1 text-primary"></i>Categoría
                </label>
                <select class="form-select filter-select" id="category" name="category">
                    <option value="">Todas</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Marca -->
            <div class="mb-4">
                <label for="brand" class="form-label fw-semibold">
                    <i class="bi bi-award me-1 text-primary"></i>Marca
                </label>
                <select class="form-select filter-select" id="brand" name="brand">
                    <option value="">Todas</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nivel -->
            <div class="mb-4">
                <label for="level" class="form-label fw-semibold">
                    <i class="bi bi-bar-chart me-1 text-primary"></i>Nivel
                </label>
                <select class="form-select filter-select" id="level" name="level">
                    <option value="">Todos</option>
                    <option value="home" {{ request('level') == 'home' ? 'selected' : '' }}>Hogar</option>
                    <option value="professional" {{ request('level') == 'professional' ? 'selected' : '' }}>Profesional</option>
                </select>
            </div>

            <!-- Rango de Precio -->
            <div class="mb-4">
                <label class="form-label fw-semibold">
                    <i class="bi bi-currency-dollar me-1 text-primary"></i>Rango de Precio
                </label>
                <div class="row g-2">
                    <div class="col-6">
                        <input type="number" 
                               class="form-control filter-input" 
                               name="min_price" 
                               value="{{ request('min_price') }}" 
                               placeholder="Mín">
                    </div>
                    <div class="col-6">
                        <input type="number" 
                               class="form-control filter-input" 
                               name="max_price" 
                               value="{{ request('max_price') }}" 
                               placeholder="Máx">
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary filter-btn-apply">
                    <i class="bi bi-check-circle me-2"></i>Aplicar Filtros
                </button>
                <a href="{{ route('catalog.index') }}" class="btn btn-outline-secondary filter-btn-clear">
                    <i class="bi bi-x-circle me-2"></i>Limpiar
                </a>
            </div>
        </form>
    </div>
</div>

