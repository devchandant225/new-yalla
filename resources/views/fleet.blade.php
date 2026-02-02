@extends('layouts.app')

@section('content')
<div class="bg-royal-blue py-20 text-white text-center">
    <h1 class="text-5xl font-bold uppercase italic">Our Fleet</h1>
    <p class="mt-4 text-xl text-blue-200">The most powerful and stylish jetskis in Dubai</p>
</div>

<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @forelse($jetskis as $jetski)
                <div class="bg-white rounded-3xl overflow-hidden shadow-xl border border-gray-100 group">
                    <div class="relative h-72 overflow-hidden">
                        <img src="{{ $jetski->image ? asset('storage/'.$jetski->image) : 'https://images.unsplash.com/photo-1610448721566-47369c768e70?q=80&w=2070&auto=format&fit=crop' }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="{{ $jetski->name }}">
                        <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur px-4 py-2 rounded-2xl shadow-lg">
                            <span class="text-royal-blue font-bold">AED {{ $jetski->price_per_hour }}</span>
                            <span class="text-gray-500 text-sm">/ hr</span>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-3 text-royal-blue">{{ $jetski->name }}</h3>
                        <p class="text-gray-600 mb-6 line-clamp-2">{{ $jetski->description ?? 'Powerful performance meet incredible handling.' }}</p>
                        
                        <div class="flex flex-wrap gap-2 mb-8">
                            @foreach($jetski->features ?? ['High Speed', 'Luxury Seat', 'GPS Enabled'] as $feature)
                                <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-lg font-bold uppercase tracking-wider">{{ $feature }}</span>
                            @endforeach
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('fleet.detail', $jetski->slug) }}" class="bg-royal-blue text-white text-center py-4 rounded-2xl font-bold hover:bg-blue-800 transition shadow-lg shadow-blue-200">Details</a>
                            <a href="https://wa.me/{{ $jetski->whatsapp_phone ?: '971500000000' }}?text=I want to book the {{ $jetski->name }}" class="bg-green-500 text-white text-center py-4 rounded-2xl font-bold hover:bg-green-600 transition shadow-lg shadow-green-200 flex items-center justify-center">
                                <i class="fab fa-whatsapp mr-2"></i> Book
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-gray-500 text-xl">No jetskis available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="bg-gray-100 py-20">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-royal-blue mb-6">Need a Custom Package?</h2>
        <p class="text-lg text-gray-600 mb-10">We offer special rates for group bookings and long-duration rentals. Contact our team to get a personalized quote.</p>
        <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
            <a href="tel:+971500000000" class="border-2 border-royal-blue text-royal-blue px-8 py-3 rounded-full font-bold hover:bg-royal-blue hover:text-white transition">Call Now</a>
            <a href="https://wa.me/971500000000" class="bg-green-500 text-white px-8 py-3 rounded-full font-bold hover:bg-green-600 transition flex items-center justify-center">
                <i class="fab fa-whatsapp mr-2"></i> Message on WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
