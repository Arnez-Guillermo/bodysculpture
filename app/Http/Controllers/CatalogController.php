<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand', 'images'])
            ->active();

        // Filtro por categoría
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filtro por marca
        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        // Filtro por nivel
        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        // Filtro por rango de precio
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Búsqueda
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        // Ordenamiento
        $sort = $request->get('sort', 'name');
        $direction = $request->get('direction', 'asc');
        
        if ($sort === 'price') {
            $query->orderBy('price', $direction);
        } elseif ($sort === 'created_at') {
            $query->orderBy('created_at', $direction);
        } else {
            $query->orderBy('name', $direction);
        }

        $products = $query->paginate(12)->withQueryString();
        
        $categories = Category::active()->get();
        $brands = Brand::active()->get();

        return view('catalog.index', compact('products', 'categories', 'brands'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'brand', 'images', 'specifications']);
        
        if (!$product->is_active) {
            abort(404);
        }

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->limit(4)
            ->get();

        return view('catalog.show', compact('product', 'relatedProducts'));
    }

    public function category(Category $category)
    {
        $products = Product::with(['category', 'brand', 'images'])
            ->where('category_id', $category->id)
            ->active()
            ->paginate(12);

        return view('catalog.category', compact('category', 'products'));
    }
}

