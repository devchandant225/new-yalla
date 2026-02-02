@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-royal-blue">Admin Dashboard - Jetski Fleet</h1>
            <a href="{{ route('admin.jetskis.create') }}" class="bg-royal-blue text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-800 transition">
                <i class="fas fa-plus mr-2"></i> Add New Jetski
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-3xl shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-royal-blue text-white">
                        <th class="px-6 py-4 font-bold uppercase text-sm">Image</th>
                        <th class="px-6 py-4 font-bold uppercase text-sm">Name</th>
                        <th class="px-6 py-4 font-bold uppercase text-sm">Price/hr</th>
                        <th class="px-6 py-4 font-bold uppercase text-sm">Status</th>
                        <th class="px-6 py-4 font-bold uppercase text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($jetskis as $jetski)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <img src="{{ $jetski->image ? asset('storage/'.$jetski->image) : 'https://images.unsplash.com/photo-1610448721566-47369c768e70?q=80&w=2070&auto=format&fit=crop' }}" class="w-20 h-12 object-cover rounded-lg" alt="">
                        </td>
                        <td class="px-6 py-4 font-bold text-gray-800">{{ $jetski->name }}</td>
                        <td class="px-6 py-4 text-gray-600">AED {{ $jetski->price_per_hour }}</td>
                        <td class="px-6 py-4">
                            @if($jetski->is_active)
                                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-bold">Active</span>
                            @else
                                <span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full font-bold">Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-3">
                                <a href="{{ route('admin.jetskis.edit', $jetski->id) }}" class="text-blue-600 hover:text-blue-800 transition"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.jetskis.destroy', $jetski->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this jetski?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">No jetskis found in the fleet. Start by adding one!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
