<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Category;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $properties = Property::where('status', 'active')->latest()->get();
        $categories = Category::all();

        $content = view('sitemap', compact('properties', 'categories'));

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}