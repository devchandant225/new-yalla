@extends('layouts.admin')

@section('title', 'Properties')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h3 class="text-2xl font-bold text-gray-800">All Properties</h3>
    <a href="{{ route('admin.properties.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center space-x-2">
        <i class="fas fa-plus text-sm"></i>
        <span>Add Property</span>
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-4">Image</th>
                    <th class="px-6 py-4">Title</th>
                    <th class="px-6 py-4">Category</th>
                    <th class="px-6 py-4">Price</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($properties as $property)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        @if($property->primaryImage)
                            <img src="{{ asset('storage/' . $property->primaryImage->image_path) }}" class="w-16 h-12 object-cover rounded shadow-sm" alt="Property">
                        @else
                            <div class="w-16 h-12 bg-gray-100 flex items-center justify-center rounded text-gray-400">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-800">{{ $property->title }}</div>
                        <div class="text-gray-500 text-xs">{{ $property->city }} | {{ ucfirst($property->type) }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-gray-600">{{ $property->category->name }}</span>
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-700">
                        ${{ number_format($property->price) }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $property->status === 'active' ? 'bg-green-100 text-green-700' : ($property->status === 'sold' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700') }}">
                            {{ ucfirst($property->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right flex justify-end space-x-3">
                        <a href="{{ route('admin.properties.edit', $property) }}" class="text-blue-600 hover:text-blue-800 transition">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:text-red-800 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-gray-400">No properties found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
        {{ $properties->links() }}
    </div>
</div>
@endsection
