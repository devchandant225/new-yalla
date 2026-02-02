@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('admin.jetskis.index') }}" class="text-royal-blue hover:underline font-bold"><i class="fas fa-arrow-left mr-2"></i> Back to Fleet</a>
            <h1 class="text-3xl font-bold text-royal-blue mt-4">Add New Jetski</h1>
        </div>

        <div class="bg-white rounded-3xl shadow-sm p-8">
            <form action="{{ route('admin.jetskis.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Jetski Name</label>
                    <input type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition" placeholder="e.g. Yamaha WaveRunner VX" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Price Per Hour (AED)</label>
                        <input type="number" name="price_per_hour" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition" placeholder="e.g. 450" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Image</label>
                        <input type="file" name="image" class="w-full px-4 py-2 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">WhatsApp Phone</label>
                        <input type="text" name="whatsapp_phone" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition" placeholder="e.g. 971500000000">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Features (Comma separated)</label>
                        <input type="text" name="features[]" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition" placeholder="e.g. 180 HP, 3-Seater, GPS">
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition" placeholder="Describe the jetski performance, features, etc."></textarea>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Features (Comma separated)</label>
                    <input type="text" name="features[]" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition" placeholder="e.g. 180 HP, 3-Seater, GPS">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-royal-blue text-white py-4 rounded-xl font-bold text-lg hover:bg-blue-800 transition shadow-lg shadow-blue-100">
                        Create Jetski Entry
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
