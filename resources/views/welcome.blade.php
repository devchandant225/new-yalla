@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative h-[80vh] flex items-center justify-center text-white">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover" alt="Jetski Hero">
        <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>
    <div class="relative z-10 text-center px-4">
        <h1 class="text-5xl md:text-7xl font-extrabold mb-6 italic tracking-tight uppercase">Ride the Dubai Waves</h1>
        <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">Experience high-speed thrills with the most premium jetski fleet in Dubai. Book your adventure today!</p>
        <div class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4">
            <a href="{{ route('fleet') }}" class="bg-royal-blue hover:bg-blue-800 text-white px-10 py-4 rounded-full font-bold text-lg transition transform hover:scale-105">
                Explore Fleet
            </a>
            <a href="https://wa.me/971500000000" class="bg-green-500 hover:bg-green-600 text-white px-10 py-4 rounded-full font-bold text-lg transition transform hover:scale-105 flex items-center">
                <i class="fab fa-whatsapp mr-2"></i> WhatsApp Booking
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-royal-blue mb-16 uppercase italic">Why Dubai Jetski?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="p-8 rounded-2xl bg-gray-50 hover:shadow-xl transition">
                <div class="text-5xl text-blue-500 mb-6"><i class="fas fa-tachometer-alt"></i></div>
                <h3 class="text-2xl font-bold mb-4">Latest Models</h3>
                <p class="text-gray-600">We maintain a fleet of the newest, high-performance Yamaha and Sea-Doo jetskis.</p>
            </div>
            <div class="p-8 rounded-2xl bg-gray-50 hover:shadow-xl transition">
                <div class="text-5xl text-blue-500 mb-6"><i class="fas fa-shield-alt"></i></div>
                <h3 class="text-2xl font-bold mb-4">Safety First</h3>
                <p class="text-gray-600">Expert instructors and top-tier safety gear provided for every single ride.</p>
            </div>
            <div class="p-8 rounded-2xl bg-gray-50 hover:shadow-xl transition">
                <div class="text-5xl text-blue-500 mb-6"><i class="fas fa-map-marker-alt"></i></div>
                <h3 class="text-2xl font-bold mb-4">Prime Locations</h3>
                <p class="text-gray-600">Ride near iconic landmarks like Burj Al Arab and Palm Jumeirah.</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Fleet -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-4xl font-bold text-royal-blue uppercase italic">Our Top Fleet</h2>
                <p class="text-gray-600 mt-2">Pick your power and hit the water.</p>
            </div>
            <a href="{{ route('fleet') }}" class="text-royal-blue font-bold hover:underline">View All Fleet <i class="fas fa-arrow-right ml-1"></i></a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($jetskis->take(3) as $jetski)
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg group">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ $jetski->image ? asset('storage/'.$jetski->image) : 'https://images.unsplash.com/photo-1610448721566-47369c768e70?q=80&w=2070&auto=format&fit=crop' }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="{{ $jetski->name }}">
                        <div class="absolute top-4 left-4 bg-royal-blue text-white px-4 py-1 rounded-full text-sm font-bold">
                            AED {{ $jetski->price_per_hour }}/hr
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">{{ $jetski->name }}</h3>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach(array_slice($jetski->features ?? [], 0, 3) as $feature)
                                <span class="bg-blue-50 text-blue-700 text-xs px-3 py-1 rounded-full font-semibold">{{ $feature }}</span>
                            @endforeach
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('fleet.detail', $jetski->slug) }}" class="flex-1 bg-gray-100 hover:bg-gray-200 text-center py-3 rounded-xl font-bold transition">Details</a>
                            <a href="https://wa.me/{{ $jetski->whatsapp_phone ?: '971500000000' }}?text=I'm interested in booking the {{ $jetski->name }}" class="flex-1 bg-green-500 hover:bg-green-600 text-white text-center py-3 rounded-xl font-bold transition flex items-center justify-center">
                                <i class="fab fa-whatsapp mr-2"></i> Book
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Placeholder if no data -->
                @for($i=1; $i<=3; $i++)
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg group">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1610448721566-47369c768e70?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="Jetski">
                        <div class="absolute top-4 left-4 bg-royal-blue text-white px-4 py-1 rounded-full text-sm font-bold">
                            AED 450/hr
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">Yamaha WaveRunner VX</h3>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-blue-50 text-blue-700 text-xs px-3 py-1 rounded-full font-semibold">180 HP</span>
                            <span class="bg-blue-50 text-blue-700 text-xs px-3 py-1 rounded-full font-semibold">3-Seater</span>
                            <span class="bg-blue-50 text-blue-700 text-xs px-3 py-1 rounded-full font-semibold">High Stability</span>
                        </div>
                        <div class="flex space-x-2">
                            <a href="#" class="flex-1 bg-gray-100 hover:bg-gray-200 text-center py-3 rounded-xl font-bold transition">Details</a>
                            <a href="https://wa.me/971500000000" class="flex-1 bg-green-500 hover:bg-green-600 text-white text-center py-3 rounded-xl font-bold transition flex items-center justify-center">
                                <i class="fab fa-whatsapp mr-2"></i> Book
                            </a>
                        </div>
                    </div>
                </div>
                @endfor
            @endforelse
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-royal-blue text-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6 italic uppercase">Ready for the Thrill?</h2>
        <p class="text-xl mb-10 text-blue-200">Don't wait! Our jetskis are in high demand. Contact us now via WhatsApp or call us directly to secure your ride.</p>
        <div class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-6">
            <a href="https://wa.me/971500000000" class="w-full md:w-auto bg-green-500 hover:bg-green-600 px-12 py-5 rounded-full font-bold text-xl transition flex items-center justify-center">
                <i class="fab fa-whatsapp mr-3"></i> WhatsApp Now
            </a>
            <a href="tel:+971500000000" class="w-full md:w-auto bg-white text-royal-blue hover:bg-gray-100 px-12 py-5 rounded-full font-bold text-xl transition flex items-center justify-center">
                <i class="fas fa-phone-alt mr-3"></i> Call +971 50 000 0000
            </a>
        </div>
    </div>
</section>
@endsection