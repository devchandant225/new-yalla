@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stat Cards -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-blue-50 text-blue-600 rounded-lg">
                <i class="fas fa-building text-2xl"></i>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Total Properties</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['total_properties'] }}</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-green-50 text-green-600 rounded-lg">
                <i class="fas fa-tags text-2xl"></i>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Categories</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['total_categories'] }}</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-yellow-50 text-yellow-600 rounded-lg">
                <i class="fas fa-star text-2xl"></i>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Featured</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['featured_properties'] }}</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-purple-50 text-purple-600 rounded-lg">
                <i class="fas fa-eye text-2xl"></i>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Market Reach</h3>
        <p class="text-2xl font-bold text-gray-800">Global</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
        <h3 class="font-bold text-gray-800">Recent Property Additions</h3>
        <a href="{{ route('admin.properties.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">View All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-4">Property</th>
                    <th class="px-6 py-4">Price</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Added Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($stats['recent_properties'] as $property)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-800">{{ $property->title }}</div>
                        <div class="text-gray-500 text-xs">{{ $property->city }}</div>
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-700">
                        ${{ number_format($property->price) }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $property->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ ucfirst($property->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500 text-sm">
                        {{ $property->created_at->format('M d, Y') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-gray-400">
                        No properties found. Start by adding your first property!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
