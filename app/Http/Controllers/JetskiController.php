<?php

namespace App\Http\Controllers;

use App\Models\Jetski;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JetskiController extends Controller
{
    // Public Methods
    public function index()
    {
        $jetskis = Jetski::where('is_active', true)->get();
        return view('welcome', compact('jetskis'));
    }

    public function fleet()
    {
        $jetskis = Jetski::where('is_active', true)->get();
        return view('fleet', compact('jetskis'));
    }

    public function show($slug)
    {
        $jetski = Jetski::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('fleet-detail', compact('jetski'));
    }

    // Admin Methods
    public function adminIndex()
    {
        $jetskis = Jetski::all();
        return view('admin.jetskis.index', compact('jetskis'));
    }

    public function create()
    {
        return view('admin.jetskis.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_hour' => 'required|numeric',
            'whatsapp_phone' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'features' => 'nullable|array',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('jetskis', 'public');
            $validated['image'] = $path;
        }

        $validated['slug'] = Str::slug($validated['name']);
        $validated['features'] = $request->features ? explode(',', $request->features[0]) : [];

        Jetski::create($validated);

        return redirect()->route('admin.jetskis.index')->with('success', 'Jetski added successfully.');
    }

    public function edit(Jetski $jetski)
    {
        return view('admin.jetskis.edit', compact('jetski'));
    }

    public function update(Request $request, Jetski $jetski)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_hour' => 'required|numeric',
            'whatsapp_phone' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'features' => 'nullable|array',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('jetskis', 'public');
            $validated['image'] = $path;
        }

        $validated['slug'] = Str::slug($validated['name']);
        $validated['features'] = $request->features ? explode(',', $request->features[0]) : [];
        $validated['is_active'] = $request->has('is_active');

        $jetski->update($validated);

        return redirect()->route('admin.jetskis.index')->with('success', 'Jetski updated successfully.');
    }

    public function destroy(Jetski $jetski)
    {
        $jetski->delete();
        return redirect()->route('admin.jetskis.index')->with('success', 'Jetski deleted successfully.');
    }
}
