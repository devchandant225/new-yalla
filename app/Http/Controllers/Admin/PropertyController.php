<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Category;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('category', 'primaryImage')->latest()->paginate(10);
        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.properties.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'address' => 'required|string',
            'city' => 'required|string',
            'type' => 'required|in:sale,rent',
            'category_id' => 'required|exists:categories,id',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area' => 'required|numeric',
            'status' => 'required|in:active,sold,draft',
            'is_featured' => 'boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->title) . '-' . time();
        $validated['is_featured'] = $request->has('is_featured');
        
        $property = Property::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('properties', 'public');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path' => $path,
                    'is_primary' => $index === 0
                ]);
            }
        }

        return redirect()->route('admin.properties.index')->with('success', 'Property created successfully!');
    }

    public function edit(Property $property)
    {
        $categories = Category::all();
        return view('admin.properties.edit', compact('property', 'categories'));
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'address' => 'required|string',
            'city' => 'required|string',
            'type' => 'required|in:sale,rent',
            'category_id' => 'required|exists:categories,id',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area' => 'required|numeric',
            'status' => 'required|in:active,sold,draft',
            'is_featured' => 'boolean',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $property->update($validated);

        return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully!');
    }

    public function destroy(Property $property)
    {
        foreach ($property->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }
        $property->delete();
        return redirect()->route('admin.properties.index')->with('success', 'Property deleted successfully!');
    }
}