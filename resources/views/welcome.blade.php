@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-emerald-900 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=1974&auto=format&fit=crop" alt="Fresh Vegetables" class="w-full h-full object-cover opacity-20">
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 flex flex-col items-center text-center">
        <span class="text-emerald-300 font-bold tracking-wider uppercase mb-4 text-sm bg-emerald-900/50 px-4 py-1 rounded-full border border-emerald-700">100% Organic & Fresh</span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 tracking-tight leading-tight">
            Nature's Goodness <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-green-300">Delivered to You</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
            Shop the freshest fruits, crisp vegetables, and pantry essentials sourced directly from local organic farms. Sustainable, healthy, and delicious.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 w-full justify-center">
            <a href="{{ route('shop') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-4 rounded-full font-bold text-lg transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                Start Shopping
            </a>
            <a href="{{ route('about') }}" class="bg-white text-gray-900 hover:bg-gray-100 px-8 py-4 rounded-full font-bold text-lg transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                Our Producers
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-12 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-emerald-50 transition duration-300">
                <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 text-xl">
                    <i class="fas fa-truck"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">Free Delivery</h3>
                    <p class="text-sm text-gray-500">On all orders over $50</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-emerald-50 transition duration-300">
                <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 text-xl">
                    <i class="fas fa-leaf"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">Fresh Guarantee</h3>
                    <p class="text-sm text-gray-500">Money back if not fresh</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-emerald-50 transition duration-300">
                <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 text-xl">
                    <i class="fas fa-headset"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">24/7 Support</h3>
                    <p class="text-sm text-gray-500">Contact us anytime</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Shop by Category</h2>
            <div class="w-20 h-1 bg-emerald-500 mx-auto rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($categories as $category)
                <a href="{{ route('shop', ['category' => $category->slug]) }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <div class="h-40 overflow-hidden relative bg-gray-100">
                        @if($category->image)
                            <!-- Placeholder image logic since seeder paths might not exist yet physically -->
                            <img src="https://source.unsplash.com/random/400x300/?{{ $category->slug }}" 
                                 onerror="this.src='https://images.unsplash.com/photo-1610348725531-843dff563e2c?w=400&q=80'"
                                 alt="{{ $category->name }}" 
                                 class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                <i class="fas fa-shopping-basket text-4xl text-gray-300"></i>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition duration-300"></div>
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="font-bold text-gray-900 group-hover:text-emerald-600 transition">{{ $category->name }}</h3>
                        <p class="text-xs text-gray-500 mt-1">{{ $category->products_count ?? '0' }} items</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Fresh Arrivals</h2>
                <p class="text-gray-500">Check out our latest organic products.</p>
            </div>
            <a href="{{ route('shop') }}" class="group text-emerald-600 font-bold hover:text-emerald-700 flex items-center gap-2">
                View All Products <i class="fas fa-arrow-right transition transform group-hover:translate-x-1"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($featuredProducts as $product)
                <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300 group flex flex-col h-full">
                    <div class="relative h-64 overflow-hidden bg-gray-50 p-4 flex items-center justify-center">
                        <a href="{{ route('product.show', $product->slug) }}" class="block w-full h-full">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-contain transition duration-500 group-hover:scale-110">
                            @else
                                <img src="https://source.unsplash.com/random/400x400/?{{ $product->category->slug ?? 'grocery' }}" 
                                     onerror="this.src='https://images.unsplash.com/photo-1542838132-92c53300491e?w=400&q=80'"
                                     class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            @endif
                        </a>
                        @if($loop->first)
                            <div class="absolute top-4 left-4 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">HOT</div>
                        @endif
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="text-xs font-bold text-emerald-600 uppercase mb-2">{{ $product->category->name }}</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 truncate group-hover:text-emerald-600 transition">
                            <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                        </h3>
                        <div class="mt-auto flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-10 h-10 rounded-full bg-gray-100 text-emerald-600 hover:bg-emerald-500 hover:text-white transition flex items-center justify-center">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-12 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
                    <i class="fas fa-carrot text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">No fresh products available right now. Check back soon!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Promo Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-3xl overflow-hidden bg-emerald-900 text-white shadow-2xl">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1608686207856-001b95cf60ca?q=80&w=2000&auto=format&fit=crop" class="w-full h-full object-cover opacity-30" alt="Promo">
            </div>
            <div class="relative z-10 px-8 py-16 md:py-24 md:px-16 text-center md:text-left max-w-2xl">
                <h2 class="text-3xl md:text-5xl font-bold mb-6">Get 20% Off Your First Order</h2>
                <p class="text-emerald-100 text-lg mb-8">Join the FreshMarket family today and experience the difference of locally sourced, organic produce.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <input type="email" placeholder="Enter your email" class="px-6 py-4 rounded-full text-gray-900 focus:outline-none focus:ring-2 focus:ring-emerald-400 w-full sm:w-auto">
                    <button class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-4 rounded-full font-bold transition shadow-lg">Subscribe</button>
                </div>
                <p class="text-xs text-emerald-300 mt-4">*Terms and conditions apply.</p>
            </div>
        </div>
    </div>
</section>

<x-more-info-section />

@endsection