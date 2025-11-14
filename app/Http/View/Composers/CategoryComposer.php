<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view): void
    {
        $view->with('categories', Category::active()->get());
    }
}

