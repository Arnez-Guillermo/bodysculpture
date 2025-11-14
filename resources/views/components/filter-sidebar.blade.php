<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Filtros</h5>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('catalog.index') }}">
            <!-- Búsqueda -->
            <div class="mb-3">
                <label for="search" class="form-label">Buscar</label>
                <input type="text" 
                       class="form-control" 
                       id="search" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Nombre, SKU...">
            </div>

            <!-- Categoría -->
            <div class="mb-3">
                <label for="category" class="form-label">Categoría</label>
                <select class="form-select" id="category" name="category">
                    <option value="">Todas</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Marca -->
            <div class="mb-3">
                <label for="brand" class="form-label">Marca</label>
                <select class="form-select" id="brand" name="brand">
                    <option value="">Todas</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nivel -->
            <div class="mb-3">
                <label for="level" class="form-label">Nivel</label>
                <select class="form-select" id="level" name="level">
                    <option value="">Todos</option>
                    <option value="home" {{ request('level') == 'home' ? 'selected' : '' }}>Hogar</option>
                    <option value="professional" {{ request('level') == 'professional' ? 'selected' : '' }}>Profesional</option>
                </select>
            </div>

            <!-- Rango de Precio -->
            <div class="mb-3">
                <label class="form-label">Rango de Precio</label>
                <div class="row">
                    <div class="col-6">
                        <input type="number" 
                               class="form-control" 
                               name="min_price" 
                               value="{{ request('min_price') }}" 
                               placeholder="Mín">
                    </div>
                    <div class="col-6">
                        <input type="number" 
                               class="form-control" 
                               name="max_price" 
                               value="{{ request('max_price') }}" 
                               placeholder="Máx">
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                <a href="{{ route('catalog.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </form>
    </div>
</div>

