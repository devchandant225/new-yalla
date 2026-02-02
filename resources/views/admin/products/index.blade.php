@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Product Management</h1>
    <a href="{{ route('admin.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        <i class="fas fa-plus mr-2"></i> Add Product
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-6 py-4">Image</th>
                <th class="px-6 py-4">Name</th>
                <th class="px-6 py-4">Category</th>
                <th class="px-6 py-4">Price</th>
                <th class="px-6 py-4">Stock</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($products as $product)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-10 h-10 object-cover rounded">
                    @else
                        <div class="w-10 h-10 bg-gray-200 rounded flex items-center justify-center text-gray-400">
                            <i class="fas fa-image"></i>
                        </div>
                    @endif
                </td>
                <td class="px-6 py-4 font-medium">{{ $product->name }}</td>
                <td class="px-6 py-4 text-gray-500">{{ $product->category->name }}</td>
                <td class="px-6 py-4 font-bold text-gray-700">${{ number_format($product->price, 2) }}</td>
                <td class="px-6 py-4">{{ $product->stock }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded text-xs font-bold {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
