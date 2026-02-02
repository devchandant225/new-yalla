@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Order #{{ $order->id }}</h1>
                <a href="{{ route('orders.index') }}" class="text-gray-600 hover:text-royal-blue transition">Back to Orders</a>
            </div>

            @if(session('success'))
                <div class="mb-8 p-4 bg-green-100 text-green-700 border border-green-400 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Order Details -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <h2 class="text-xl font-bold text-gray-900">Items</h2>
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase
                                @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                @elseif($order->status == 'shipped') bg-purple-100 text-purple-800
                                @elseif($order->status == 'completed') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ $order->status }}
                            </span>
                        </div>
                        <ul class="divide-y divide-gray-100">
                            @foreach($order->items as $item)
                                <li class="p-6 flex items-center">
                                    <div class="h-16 w-16 flex-shrink-0 bg-gray-100 rounded-lg overflow-hidden mr-4">
                                        @if($item->product && $item->product->image)
                                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="flex items-center justify-center h-full text-gray-400">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-sm font-bold text-gray-900">{{ $item->product ? $item->product->name : 'Product Removed' }}</h3>
                                        <p class="text-xs text-gray-500">Qty: {{ $item->quantity }}</p>
                                    </div>
                                    <div class="text-right font-bold text-gray-900">
                                        ${{ number_format($item->price * $item->quantity, 2) }}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="bg-gray-50 p-6 border-t border-gray-100 flex justify-between items-center">
                            <span class="font-bold text-gray-900">Total Amount</span>
                            <span class="text-xl font-bold text-royal-blue">${{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Shipping Info -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-4 border-b pb-2">Shipping Information</h2>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $order->shipping_address }}
                        </p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4 border-b pb-2">Payment Status</h2>
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase
                            @if($order->payment_status == 'paid') bg-green-100 text-green-800
                            @elseif($order->payment_status == 'failed') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ $order->payment_status }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
