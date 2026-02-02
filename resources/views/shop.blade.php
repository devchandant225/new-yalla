@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Shop</h1>
            
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Sidebar -->
                <div class="w-full md:w-1/4">
                    <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2">Categories</h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="{{ route('shop') }}" class="block {{ !request('category') ? 'text-royal-blue font-bold' : 'text-gray-600 hover:text-royal-blue' }}">
                                    All Products
                                </a>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('shop', ['category' => $category->slug]) }}" class="block {{ request('category') == $category->slug ? 'text-royal-blue font-bold' : 'text-gray-600 hover:text-royal-blue' }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="w-full md:w-3/4">
                    @if($products->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($products as $product)
                                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 group">
                                    <div class="relative h-64 overflow-hidden bg-gray-100">
                                        <a href="{{ route('product.show', $product->slug) }}">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                                            @else
                                                <div class="flex items-center justify-center h-full text-gray-400">
                                                    <i class="fas fa-image text-4xl"></i>
                                                </div>
                                            @endif
                                        </a>
                                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur text-gray-900 px-3 py-1 rounded-full text-sm font-bold shadow-sm">
                                            ${{ number_format($product->price, 2) }}
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-lg font-bold text-gray-900 mb-2 truncate">
                                            <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                        </h3>
                                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $product->description }}</p>
                                        
                                        <form action="{{ route('cart.add', $product) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="w-full bg-royal-blue text-white font-bold py-3 rounded-xl hover:bg-blue-800 transition flex items-center justify-center">
                                                <i class="fas fa-cart-plus mr-2"></i> Add to Cart
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-8">
                            {{ $products->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 text-lg">No products found in this category.</p>
                            <a href="{{ route('shop') }}" class="text-royal-blue font-bold hover:underline mt-2 inline-block">View all products</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
