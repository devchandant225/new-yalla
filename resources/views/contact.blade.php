@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=1920&q=80"
                 alt="Contact Dubai Jetski"
                 class="w-full h-full object-cover brightness-50">
        </div>
        <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
            <span class="text-blue-400 font-bold tracking-widest uppercase text-sm mb-4 block">24/7 Support</span>
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight tracking-tight">
                Let's Start Your <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Adventure</span>
            </h1>
            <p class="text-gray-300 text-lg md:text-xl max-w-2xl mx-auto">
                Have questions? Ready to book? Our team is here to help you plan the perfect experience on the water.
            </p>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="relative z-20 -mt-20 pb-20 px-4">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Location -->
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:-translate-y-2 transition duration-300 border-b-4 border-royal-blue group">
                <div class="w-14 h-14 bg-blue-50 text-royal-blue rounded-xl flex items-center justify-center mb-6 text-2xl group-hover:bg-royal-blue group-hover:text-white transition">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Visit Us</h3>
                <p class="text-gray-500 mb-4 leading-relaxed">Jumeirah Beach Residence<br>Dubai Marina, UAE</p>
                <a href="https://maps.google.com/?q=jumeirah+beach+dubai" class="text-royal-blue font-semibold hover:text-blue-800 flex items-center">
                    Get Directions <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>

            <!-- Phone -->
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:-translate-y-2 transition duration-300 border-b-4 border-royal-blue group">
                <div class="w-14 h-14 bg-blue-50 text-royal-blue rounded-xl flex items-center justify-center mb-6 text-2xl group-hover:bg-royal-blue group-hover:text-white transition">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Call Us</h3>
                <p class="text-gray-500 mb-4 leading-relaxed">Mon-Sun: 8am - 7pm<br>Support: 24/7</p>
                <a href="tel:+971500000000" class="text-royal-blue font-semibold hover:text-blue-800 flex items-center">
                    +971 50 000 0000 <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>

            <!-- WhatsApp -->
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:-translate-y-2 transition duration-300 border-b-4 border-green-500 group">
                <div class="w-14 h-14 bg-green-50 text-green-500 rounded-xl flex items-center justify-center mb-6 text-2xl group-hover:bg-green-500 group-hover:text-white transition">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Chat with Us</h3>
                <p class="text-gray-500 mb-4 leading-relaxed">Instant booking confirmation<br>& quick answers.</p>
                <a href="https://wa.me/971500000000" class="text-green-600 font-semibold hover:text-green-700 flex items-center">
                    Open WhatsApp <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-royal-blue font-bold tracking-widest uppercase text-sm">Contact Form</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Send us a Message</h2>
                <div class="w-20 h-1 bg-royal-blue mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="bg-white rounded-3xl shadow-lg p-8 md:p-12">
                @if(session('success'))
                    <div class="mb-8 p-4 bg-green-50 text-green-700 border border-green-200 rounded-xl flex items-center">
                        <i class="fas fa-check-circle mr-3 text-xl"></i>
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-royal-blue transition">First Name</label>
                            <input type="text" name="first_name" required class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-4 focus:ring-blue-50 outline-none transition duration-300">
                        </div>
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-royal-blue transition">Last Name</label>
                            <input type="text" name="last_name" required class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-4 focus:ring-blue-50 outline-none transition duration-300">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-royal-blue transition">Email Address</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-4 focus:ring-blue-50 outline-none transition duration-300">
                        </div>
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-royal-blue transition">Phone Number</label>
                            <input type="tel" name="phone" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-4 focus:ring-blue-50 outline-none transition duration-300">
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-royal-blue transition">Subject</label>
                        <div class="relative">
                            <select name="subject" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-4 focus:ring-blue-50 outline-none transition duration-300 appearance-none cursor-pointer">
                                <option value="Jetski Booking">Jetski Booking</option>
                                <option value="Group Booking">Group Booking</option>
                                <option value="Event Inquiry">Event Inquiry</option>
                                <option value="General Inquiry">General Inquiry</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                <i class="fas fa-chevron-down text-sm"></i>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-royal-blue transition">Message</label>
                        <textarea name="message" rows="5" required class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-4 focus:ring-blue-50 outline-none transition duration-300 resize-none"></textarea>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-gradient-to-r from-royal-blue to-blue-700 text-white font-bold py-4 rounded-xl hover:shadow-lg hover:from-blue-800 hover:to-blue-900 transform hover:-translate-y-1 transition duration-300">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Map Section (Full Width Bottom) -->
    <section class="h-[500px] w-full relative grayscale hover:grayscale-0 transition duration-700">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.7010336255!2d55.27928331475928!3d25.09656838396748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6b7b6b7b6b7b%3A0x7b7b7b7b7b7b7b7b!2sJumeirah%20Beach%20Residence%2C%20Dubai!5e0!3m2!1sen!2sae!4v1610000000000!5m2!1sen!2sae"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="absolute inset-0 w-full h-full"></iframe>
    </section>
@endsection
