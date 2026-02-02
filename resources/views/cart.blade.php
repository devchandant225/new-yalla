@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Shopping Cart</h1>

            @if(session('success'))
                <div class="mb-8 p-4 bg-green-100 text-green-700 border border-green-400 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            @if(count($cartItems) > 0)
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Cart Items -->
                    <div class="lg:w-2/3">
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <table class="w-full text-left">
                                <thead class="bg-gray-100 border-b border-gray-200">
                                    <tr>
                                        <th class="px-6 py-4 font-bold text-gray-600 uppercase text-xs">Product</th>
                                        <th class="px-6 py-4 font-bold text-gray-600 uppercase text-xs text-center">Quantity</th>
                                        <th class="px-6 py-4 font-bold text-gray-600 uppercase text-xs text-right">Total</th>
                                        <th class="px-6 py-4 font-bold text-gray-600 uppercase text-xs text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($cartItems as $item)
                                        <tr>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="h-16 w-16 flex-shrink-0 bg-gray-100 rounded-lg overflow-hidden mr-4">
                                                        @if($item['product']->image)
                                                            <img src="{{ asset('storage/' . $item['product']->image) }}" alt="{{ $item['product']->name }}" class="w-full h-full object-cover">
                                                        @else
                                                            <div class="flex items-center justify-center h-full text-gray-400">
                                                                <i class="fas fa-image"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <h3 class="text-sm font-bold text-gray-900">{{ $item['product']->name }}</h3>
                                                        <p class="text-xs text-gray-500">${{ number_format($item['product']->price, 2) }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <form action="{{ route('cart.update', $item['product']) }}" method="POST">
                                                    @csrf
                                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 text-center border border-gray-300 rounded-lg p-1 text-sm focus:ring-royal-blue focus:border-royal-blue" onchange="this.form.submit()">
                                                </form>
                                            </td>
                                            <td class="px-6 py-4 text-right font-bold text-royal-blue">
                                                ${{ number_format($item['subtotal'], 2) }}
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <form action="{{ route('cart.remove', $item['product']) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="lg:w-1/3">
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>
                            <div class="flex justify-between mb-4">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-bold text-gray-900">${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between mb-4">
                                <span class="text-gray-600">Shipping</span>
                                <span class="text-green-500 font-bold">Free</span>
                            </div>
                            <div class="border-t border-gray-100 pt-4 mb-6 flex justify-between">
                                <span class="text-lg font-bold text-gray-900">Total</span>
                                <span class="text-xl font-bold text-royal-blue">${{ number_format($total, 2) }}</span>
                            </div>
                            <a href="{{ route('checkout.index') }}" class="block w-full bg-royal-blue text-white text-center font-bold py-4 rounded-xl hover:bg-blue-800 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                Proceed to Checkout
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-3xl shadow-sm">
                    <div class="text-gray-200 mb-6">
                        <i class="fas fa-shopping-cart text-8xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Your cart is empty</h2>
                    <p class="text-gray-500 mb-8">Looks like you haven't added anything to your cart yet.</p>
                    <a href="{{ route('shop') }}" class="inline-block bg-royal-blue text-white px-8 py-3 rounded-full font-bold hover:bg-blue-800 transition">
                        Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
