@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Checkout</h1>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Checkout Form -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 border-b pb-4">Shipping Information</h2>
                        
                        <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-gray-700 font-bold mb-2">First Name</label>
                                    <input type="text" value="{{ auth()->user()->name }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-500 cursor-not-allowed" readonly>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-bold mb-2">Email Address</label>
                                    <input type="email" value="{{ auth()->user()->email }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-500 cursor-not-allowed" readonly>
                                </div>
                            </div>

                            <div class="mb-6">
                                <label class="block text-gray-700 font-bold mb-2">Address</label>
                                <input type="text" name="shipping_address" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                                <div>
                                    <label class="block text-gray-700 font-bold mb-2">City</label>
                                    <input type="text" name="city" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-bold mb-2">Zip Code</label>
                                    <input type="text" name="zip" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-bold mb-2">Country</label>
                                    <input type="text" name="country" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition">
                                </div>
                            </div>

                            <h2 class="text-xl font-bold text-gray-900 mb-6 border-b pb-4">Payment Method</h2>
                            <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 mb-6 flex items-center">
                                <input type="radio" checked class="w-4 h-4 text-royal-blue border-gray-300 focus:ring-royal-blue">
                                <span class="ml-3 font-bold text-gray-900">Cash on Delivery (COD)</span>
                            </div>

                            <button type="submit" class="w-full bg-royal-blue text-white text-center font-bold py-4 rounded-xl hover:bg-blue-800 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                Place Order
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Order Total</h2>
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
                        <div class="text-xs text-gray-500 text-center">
                            By placing your order, you agree to our Terms of Service and Privacy Policy.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
