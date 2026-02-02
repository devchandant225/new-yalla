@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[50vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1506484381205-f7945653044d?auto=format&fit=crop&w=1920&q=80"
                 alt="Farm Field"
                 class="w-full h-full object-cover brightness-50">
        </div>
        <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
            <span class="text-emerald-300 font-bold tracking-widest uppercase text-sm mb-4 block">Our Story</span>
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Rooted in <span class="text-emerald-400 italic">Quality</span>
            </h1>
            <p class="text-xl text-gray-200">Bringing the farm to your table since 2015.</p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-16 items-center">
                <div class="md:w-1/2">
                    <span class="text-emerald-600 font-bold tracking-widest uppercase text-sm mb-2 block">Who We Are</span>
                    <h2 class="text-4xl font-bold text-gray-900 mb-8">Passionate About Real Food</h2>
                    <div class="space-y-6 text-gray-600 leading-relaxed text-lg">
                        <p>
                            FreshMarket started with a simple mission: to make healthy, organic food accessible to everyone in our community. We saw a disconnect between the food we eat and where it comes from.
                        </p>
                        <p>
                            We partner directly with local farmers and artisans to ensure that what you put on your table is fresh, nutritious, and ethically sourced. By cutting out the middleman, we ensure fair prices for producers and better quality for you.
                        </p>
                    </div>
                </div>
                <div class="md:w-1/2 grid grid-cols-2 gap-4">
                    <img src="https://images.unsplash.com/photo-1488459716781-31db52582fe9?auto=format&fit=crop&w=600&q=80" class="w-full h-64 object-cover rounded-xl" alt="Fresh Vegetables">
                    <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=600&q=80" class="w-full h-64 object-cover rounded-xl" alt="Market Stall">
                </div>
            </div>
        </div>
    </section>

    <x-more-info-section />

    <!-- Values Section -->
    <section class="py-20 bg-emerald-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Our Core Values</h2>
                <div class="w-24 h-1 bg-emerald-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="p-8 border border-emerald-700 hover:border-emerald-400 transition duration-500 bg-emerald-800/30 rounded-2xl">
                    <div class="text-emerald-400 text-4xl mb-6"><i class="fas fa-heart"></i></div>
                    <h3 class="text-2xl font-bold text-white mb-4">Health First</h3>
                    <p class="text-emerald-100">We prioritize nutrient-dense, chemical-free foods that nourish your body and mind.</p>
                </div>
                <div class="p-8 border border-emerald-700 hover:border-emerald-400 transition duration-500 bg-emerald-800/30 rounded-2xl">
                    <div class="text-emerald-400 text-4xl mb-6"><i class="fas fa-globe-americas"></i></div>
                    <h3 class="text-2xl font-bold text-white mb-4">Sustainability</h3>
                    <p class="text-emerald-100">We are committed to eco-friendly practices, from compostable packaging to reduced food miles.</p>
                </div>
                <div class="p-8 border border-emerald-700 hover:border-emerald-400 transition duration-500 bg-emerald-800/30 rounded-2xl">
                    <div class="text-emerald-400 text-4xl mb-6"><i class="fas fa-users"></i></div>
                    <h3 class="text-2xl font-bold text-white mb-4">Community</h3>
                    <p class="text-emerald-100">We support local economies by sourcing from neighboring farms and small businesses.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-emerald-600 font-bold tracking-widest uppercase text-sm mb-2 block">Our Team</span>
                <h2 class="text-4xl font-bold text-gray-900">Meet The Growers</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1595433707802-6b2626ef1c91?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover" alt="Farmer">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900">John Smith</h3>
                        <p class="text-emerald-600 font-bold mt-1">Head Farmer</p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover" alt="Team Member">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900">Sarah Johnson</h3>
                        <p class="text-emerald-600 font-bold mt-1">Nutritionist</p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover" alt="Team Member">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900">Mike Brown</h3>
                        <p class="text-emerald-600 font-bold mt-1">Logistics</p>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover" alt="Team Member">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900">Emily Davis</h3>
                        <p class="text-emerald-600 font-bold mt-1">Customer Care</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-emerald-600 to-green-500 text-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Join the Fresh Food Revolution</h2>
            <p class="text-xl mb-10 text-emerald-100">Start eating healthier today with our farm-fresh delivery service.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('shop') }}" class="bg-white text-emerald-600 px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition inline-flex items-center justify-center">
                    <i class="fas fa-shopping-basket mr-2"></i> Shop Now
                </a>
                <a href="{{ route('contact') }}" class="bg-emerald-800 text-white px-8 py-4 rounded-full font-bold hover:bg-emerald-900 transition inline-flex items-center justify-center">
                    <i class="fas fa-envelope mr-2"></i> Contact Us
                </a>
            </div>
        </div>
    </section>
@endsection
