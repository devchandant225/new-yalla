@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stat Cards -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-blue-50 text-blue-600 rounded-lg">
                <i class="fas fa-box text-2xl"></i>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Total Products</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['total_products'] }}</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-green-50 text-green-600 rounded-lg">
                <i class="fas fa-shopping-cart text-2xl"></i>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Total Orders</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['total_orders'] }}</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-yellow-50 text-yellow-600 rounded-lg">
                <i class="fas fa-clock text-2xl"></i>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Pending Orders</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['pending_orders'] }}</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-purple-50 text-purple-600 rounded-lg">
                <i class="fas fa-users text-2xl"></i>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Total Users</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['total_users'] }}</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
        <h3 class="font-bold text-gray-800">Recent Orders</h3>
        <a href="{{ route('admin.orders.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">View All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-4">Order ID</th>
                    <th class="px-6 py-4">Customer</th>
                    <th class="px-6 py-4">Total</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($stats['recent_orders'] as $order)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-bold text-gray-900">#{{ $order->id }}</td>
                    <td class="px-6 py-4">{{ $order->user->name ?? 'Guest' }}</td>
                    <td class="px-6 py-4 font-semibold text-gray-700">
                        ${{ number_format($order->total_amount, 2) }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium 
                            @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                            @elseif($order->status == 'shipped') bg-purple-100 text-purple-800
                            @elseif($order->status == 'completed') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500 text-sm">
                        {{ $order->created_at->format('M d, Y') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                        No orders yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection