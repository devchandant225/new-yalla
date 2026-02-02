@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <!-- Image -->
                    <div class="h-96 md:h-auto bg-gray-100 relative">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="flex items-center justify-center h-full text-gray-400">
                                <i class="fas fa-image text-6xl"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Details -->
                    <div class="p-8 md:p-12 flex flex-col justify-center">
                        <div class="mb-4">
                            <span class="bg-blue-100 text-royal-blue px-3 py-1 rounded-full text-sm font-bold uppercase tracking-wide">
                                {{ $product->category->name }}
                            </span>
                        </div>
                        <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
                        <div class="text-3xl font-bold text-royal-blue mb-6">${{ number_format($product->price, 2) }}</div>
                        
                        <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                            {{ $product->description }}
                        </p>

                        <form action="{{ route('cart.add', $product) }}" method="POST" class="flex items-center gap-4">
                            @csrf
                            <div class="w-32">
                                <label for="quantity" class="sr-only">Quantity</label>
                                <div class="relative flex items-center max-w-[8rem]">
                                    <button type="button" onclick="decrement()" class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                        <i class="fas fa-minus text-gray-900 text-xs"></i>
                                    </button>
                                    <input type="text" id="quantity" name="quantity" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5" value="1" required />
                                    <button type="button" onclick="increment()" class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                        <i class="fas fa-plus text-gray-900 text-xs"></i>
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="flex-1 bg-royal-blue text-white font-bold py-3 px-8 rounded-xl hover:bg-blue-800 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <i class="fas fa-cart-plus mr-2"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @if($relatedProducts->count() > 0)
                <div class="mt-16">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Products</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                        @foreach($relatedProducts as $related)
                            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 group">
                                <div class="relative h-48 overflow-hidden bg-gray-100">
                                    <a href="{{ route('product.show', $related->slug) }}">
                                        @if($related->image)
                                            <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                                        @else
                                            <div class="flex items-center justify-center h-full text-gray-400">
                                                <i class="fas fa-image text-3xl"></i>
                                            </div>
                                        @endif
                                    </a>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-md font-bold text-gray-900 mb-1 truncate">
                                        <a href="{{ route('product.show', $related->slug) }}">{{ $related->name }}</a>
                                    </h3>
                                    <div class="text-royal-blue font-bold">${{ number_format($related->price, 2) }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function increment() {
            var input = document.getElementById('quantity');
            input.value = parseInt(input.value) + 1;
        }
        function decrement() {
            var input = document.getElementById('quantity');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>
@endsection
