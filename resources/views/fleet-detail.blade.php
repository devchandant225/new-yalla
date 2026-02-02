@extends('layouts.app')

@section('content')
<section class="py-12 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <!-- Image Gallery (Simplified) -->
            <div class="space-y-6">
                <div class="rounded-3xl overflow-hidden shadow-2xl">
                    <img src="{{ $jetski->image ? asset('storage/'.$jetski->image) : 'https://images.unsplash.com/photo-1610448721566-47369c768e70?q=80&w=2070&auto=format&fit=crop' }}" class="w-full h-[500px] object-cover" alt="{{ $jetski->name }}">
                </div>
            </div>

            <!-- Details -->
            <div>
                <nav class="flex mb-4 text-sm font-medium text-gray-500">
                    <a href="{{ route('home') }}" class="hover:text-royal-blue">Home</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('fleet') }}" class="hover:text-royal-blue">Fleet</a>
                    <span class="mx-2">/</span>
                    <span class="text-royal-blue">{{ $jetski->name }}</span>
                </nav>
                
                <h1 class="text-4xl md:text-5xl font-bold text-royal-blue mb-4 uppercase italic tracking-tight">{{ $jetski->name }}</h1>
                
                <div class="inline-block bg-blue-50 border border-blue-100 px-6 py-3 rounded-2xl mb-8">
                    <span class="text-3xl font-extrabold text-royal-blue">AED {{ $jetski->price_per_hour }}</span>
                    <span class="text-gray-500 font-bold ml-1">/ hour</span>
                </div>

                <div class="prose prose-lg text-gray-600 mb-10">
                    <p>{{ $jetski->description ?? 'Experience the pinnacle of watercraft engineering with the '.$jetski->name.'. Designed for speed, stability, and style, this jetski offers an unparalleled experience on the Dubai waters.' }}</p>
                </div>

                <div class="mb-10">
                    <h3 class="text-xl font-bold text-royal-blue mb-4 uppercase tracking-wider">Key Features</h3>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($jetski->features ?? ['High-Output Engine', 'Intelligent Brake & Reverse', 'Eco Mode', 'Comfort Seats'] as $feature)
                            <div class="flex items-center space-x-3 bg-gray-50 p-4 rounded-xl">
                                <i class="fas fa-check-circle text-blue-500"></i>
                                <span class="font-bold text-gray-700">{{ $feature }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-royal-blue mb-2 uppercase tracking-wider">Book This Jetski</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="https://wa.me/{{ $jetski->whatsapp_phone ?: '971500000000' }}?text=I'm interested in booking the {{ $jetski->name }}" class="bg-green-500 hover:bg-green-600 text-white text-center py-5 rounded-2xl font-bold text-xl transition flex items-center justify-center shadow-lg shadow-green-100">
                            <i class="fab fa-whatsapp mr-3 text-2xl"></i> WhatsApp Booking
                        </a>
                        <a href="tel:+{{ $jetski->whatsapp_phone ?: '+971500000000' }}" class="bg-royal-blue hover:bg-blue-800 text-white text-center py-5 rounded-2xl font-bold text-xl transition flex items-center justify-center shadow-lg shadow-blue-100">
                            <i class="fas fa-phone-alt mr-3"></i> Call to Book
                        </a>
                    </div>
                </div>
                
                <p class="mt-6 text-sm text-gray-500 italic">* Valid Emirates ID or Passport required. Minimum age 18+. Terms & Conditions apply.</p>
            </div>
        </div>
    </div>
</section>
@endsection
