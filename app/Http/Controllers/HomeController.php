<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_active', true)->latest()->take(8)->get();
        $categories = Category::has('products')->take(4)->get();
        
        return view('welcome', compact('featuredProducts', 'categories'));
    }
}