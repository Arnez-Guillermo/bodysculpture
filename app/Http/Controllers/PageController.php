<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function home()
    {
        $categories = Category::active()->whereNull('parent_id')->limit(4)->get();
        $featuredProducts = Product::with(['category', 'brand', 'images'])
            ->featured()
            ->active()
            ->inStock()
            ->limit(4)
            ->get();

        return view('home', compact('categories', 'featuredProducts'));
    }
}
