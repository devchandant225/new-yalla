<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_properties' => Property::count(),
            'total_categories' => Category::count(),
            'featured_properties' => Property::where('is_featured', true)->count(),
            'recent_properties' => Property::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}