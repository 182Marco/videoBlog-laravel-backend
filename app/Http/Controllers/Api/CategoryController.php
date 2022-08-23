<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function  getCategories() {
        
        $category = Category::orderBy('name')->get();
        return response()->json($category);
    }
}
