<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function  getCategories() {
        
        $categories = Category::orderBy('name')->get();

        foreach($categories as $category) {
            if($category->img) {
                $category->img = url('storage/' . $category->img);
            }

        }


        return response()->json($categories);
    }
}
