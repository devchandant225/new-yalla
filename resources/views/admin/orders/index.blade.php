@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Order Management</h1>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-6 py-4">Order ID</th>
                <th class="px-6 py-4">Customer</th>
                <th class="px-6 py-4">Total</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Date</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($orders as $order)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-bold">#{{ $order->id }}</td>
                <td class="px-6 py-4">
                    <div class="font-medium">{{ $order->user->name ?? 'Unknown' }}</div>
                    <div class="text-xs text-gray-500">{{ $order->user->email ?? '' }}</div>
                </td>
                <td class="px-6 py-4 font-bold text-gray-700">${{ number_format($order->total_amount, 2) }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded text-xs font-bold 
                        @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                        @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                        @elseif($order->status == 'shipped') bg-purple-100 text-purple-800
                        @elseif($order->status == 'completed') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $order->created_at->format('M d, Y H:i') }}</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 hover:text-blue-800">View Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
