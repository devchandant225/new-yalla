@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">My Orders</h1>

            @if($orders->count() > 0)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-gray-100 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 font-bold text-gray-600 uppercase text-xs">Order ID</th>
                                <th class="px-6 py-4 font-bold text-gray-600 uppercase text-xs">Date</th>
                                <th class="px-6 py-4 font-bold text-gray-600 uppercase text-xs">Status</th>
                                <th class="px-6 py-4 font-bold text-gray-600 uppercase text-xs text-right">Total</th>
                                <th class="px-6 py-4 font-bold text-gray-600 uppercase text-xs text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($orders as $order)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-bold text-gray-900">#{{ $order->id }}</td>
                                    <td class="px-6 py-4 text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase
                                            @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                            @elseif($order->status == 'shipped') bg-purple-100 text-purple-800
                                            @elseif($order->status == 'completed') bg-green-100 text-green-800
                                            @else bg-red-100 text-red-800 @endif">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right font-bold text-gray-900">${{ number_format($order->total_amount, 2) }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('orders.show', $order) }}" class="text-royal-blue hover:text-blue-800 font-bold text-sm">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-3xl shadow-sm">
                    <div class="text-gray-200 mb-6">
                        <i class="fas fa-shopping-bag text-8xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">No orders yet</h2>
                    <p class="text-gray-500 mb-8">Start shopping to see your orders here.</p>
                    <a href="{{ route('shop') }}" class="inline-block bg-royal-blue text-white px-8 py-3 rounded-full font-bold hover:bg-blue-800 transition">
                        Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
