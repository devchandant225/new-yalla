@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=1920&q=80"
                 alt="Dubai Jetski Adventure"
                 class="w-full h-full object-cover brightness-50">
        </div>
        <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
            <span class="text-white font-bold tracking-widest uppercase text-sm mb-4 block">Premium Water Adventures</span>
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Dubai's Premier <span class="text-blue-300 italic">Jetski Experience</span>
            </h1>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-16 items-center">
                <div class="md:w-1/2">
                    <span class="text-royal-blue font-bold tracking-widest uppercase text-sm mb-2 block">Our Story</span>
                    <h2 class="text-4xl font-bold text-gray-900 mb-8">A Legacy of Thrills & Excellence</h2>
                    <div class="space-y-6 text-gray-600 leading-relaxed text-lg">
                        <p>
                            Founded in 2015, Dubai Jetski began with a passion for marine adventures and a commitment to providing the safest, most thrilling water experiences in Dubai. We recognized that the crystal-clear waters of Dubai deserve to be explored with the finest equipment and expert guidance.
                        </p>
                        <p>
                            Over the years, we have provided unforgettable experiences to thousands of tourists and locals alike, exploring the stunning coastlines near Burj Al Arab, Palm Jumeirah, and other iconic Dubai landmarks. Our approach combines top-of-the-line equipment with professional safety standards.
                        </p>
                    </div>
                </div>
                <div class="md:w-1/2 grid grid-cols-2 gap-4">
                    <img src="https://images.unsplash.com/photo-1610448721566-47369c768e70?auto=format&fit=crop&w=600&q=80" class="w-full h-64 object-cover rounded-xl" alt="Jetski Fleet">
                    <img src="https://images.unsplash.com/photo-1584730904470-3b22e4c0e1bc?auto=format&fit=crop&w=600&q=80" class="w-full h-64 object-cover rounded-xl" alt="Water Adventure">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-20 bg-royal-blue text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Our Core Values</h2>
                <div class="w-24 h-1 bg-blue-300 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="p-8 border border-blue-700 hover:border-white transition duration-500 bg-blue-800/30">
                    <h3 class="text-2xl font-bold text-white mb-4">Safety First</h3>
                    <p class="text-blue-200">We prioritize your safety with top-quality life jackets, professional instruction, and well-maintained equipment. All our staff are certified in water safety and first aid.</p>
                </div>
                <div class="p-8 border border-blue-700 hover:border-white transition duration-500 bg-blue-800/30">
                    <h3 class="text-2xl font-bold text-white mb-4">Premium Equipment</h3>
                    <p class="text-blue-200">Our fleet consists of the latest model Yamaha and Sea-Doo jetskis, regularly serviced and maintained to ensure optimal performance and reliability.</p>
                </div>
                <div class="p-8 border border-blue-700 hover:border-white transition duration-500 bg-blue-800/30">
                    <h3 class="text-2xl font-bold text-white mb-4">Exceptional Service</h3>
                    <p class="text-blue-200">From booking to the end of your adventure, we provide personalized attention and professional service to make your experience memorable.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-royal-blue font-bold tracking-widest uppercase text-sm mb-2 block">Our Team</span>
                <h2 class="text-4xl font-bold text-gray-900">Meet Our Water Sports Experts</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover" alt="Team Member">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900">Ahmed Al-Mansouri</h3>
                        <p class="text-royal-blue font-bold mt-1">Operations Manager</p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover" alt="Team Member">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900">Sarah Johnson</h3>
                        <p class="text-royal-blue font-bold mt-1">Safety Director</p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover" alt="Team Member">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900">Mohammed Hassan</h3>
                        <p class="text-royal-blue font-bold mt-1">Fleet Manager</p>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover" alt="Team Member">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900">Emma Wilson</h3>
                        <p class="text-royal-blue font-bold mt-1">Customer Relations</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-royal-blue to-blue-700 text-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Ready for Your Water Adventure?</h2>
            <p class="text-xl mb-10 text-blue-200">Join us for an unforgettable experience on the beautiful waters of Dubai.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('fleet') }}" class="bg-white text-royal-blue px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition inline-flex items-center justify-center">
                    <i class="fas fa-water mr-2"></i> View Our Fleet
                </a>
                <a href="https://wa.me/971500000000" class="bg-green-500 text-white px-8 py-4 rounded-full font-bold hover:bg-green-600 transition inline-flex items-center justify-center">
                    <i class="fab fa-whatsapp mr-2"></i> WhatsApp Us
                </a>
            </div>
        </div>
    </section>

@endsection