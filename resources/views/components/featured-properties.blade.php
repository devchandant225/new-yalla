<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-16">
            <div>
                <span class="text-black font-bold tracking-widest uppercase text-sm mb-2 block">Exclusive Listings</span>
                <h2 class="text-4xl md:text-5xl font-serif font-bold text-gray-900">Featured Properties</h2>
            </div>
            <a href="{{ route('properties.index') }}" class="hidden md:inline-block px-8 py-3 border border-gray-900 text-gray-900 rounded-none hover:bg-gray-900 hover:text-white transition duration-300 uppercase tracking-wider text-sm font-bold">
                View All Properties
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($properties as $property)
            <div class="group bg-white shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden">
                <div class="relative h-80 overflow-hidden">
                    @if($property->primaryImage)
                        <img src="{{ asset('storage/' . $property->primaryImage->image_path) }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-700 grayscale group-hover:grayscale-0" 
                             alt="{{ $property->title }}">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">
                            <i class="fas fa-image text-4xl"></i>
                        </div>
                    @endif
                    
                    <div class="absolute top-4 left-4">
                        <span class="bg-gray-900 text-white text-xs font-bold px-3 py-1 uppercase tracking-widest">
                            {{ ucfirst($property->type) }}
                        </span>
                    </div>
                    <div class="absolute bottom-4 left-4 opacity-0 group-hover:opacity-100 transition duration-500">
                        <span class="bg-white text-black text-xs font-bold px-3 py-1 uppercase tracking-widest border border-black">
                            View Details
                        </span>
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex justify-between items-start mb-4">
                        <span class="text-black font-bold text-xs uppercase tracking-widest">{{ $property->category->name }}</span>
                        <span class="text-xl font-serif font-bold text-gray-900">AED {{ number_format($property->price) }}</span>
                    </div>
                    <h3 class="text-2xl font-serif font-bold text-gray-900 mb-4 line-clamp-1">
                        <a href="{{ route('properties.show', $property->slug) }}" class="hover:text-gray-600 transition">{{ $property->title }}</a>
                    </h3>
                    <p class="text-gray-500 text-sm mb-6 flex items-center">
                        <i class="fas fa-map-marker-alt mr-2 text-black"></i> {{ $property->city }}
                    </p>
                    
                    <div class="flex items-center justify-between py-6 border-t border-gray-100 text-gray-500 text-sm">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-bed"></i> <span>{{ $property->bedrooms }} Beds</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-bath"></i> <span>{{ $property->bathrooms }} Baths</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-ruler-combined"></i> <span>{{ number_format($property->area) }} sqft</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20">
                <p class="text-gray-500 text-lg">No featured properties available at the moment.</p>
            </div>
            @endforelse
        </div>
        
        <div class="mt-12 text-center md:hidden">
            <a href="{{ route('properties.index') }}" class="inline-block px-8 py-3 border border-gray-900 text-gray-900 rounded-none hover:bg-gray-900 hover:text-white transition duration-300 uppercase tracking-wider text-sm font-bold">
                View All Properties
            </a>
        </div>
    </div>
</section>