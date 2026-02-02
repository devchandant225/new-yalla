@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[50vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1579113800032-c38bd6021a81?auto=format&fit=crop&w=1920&q=80"
                 alt="Contact FreshMarket"
                 class="w-full h-full object-cover brightness-50">
        </div>
        <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
            <span class="text-emerald-400 font-bold tracking-widest uppercase text-sm mb-4 block">We're Here to Help</span>
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Get in <span class="text-emerald-400 italic">Touch</span>
            </h1>
            <p class="text-xl text-gray-200">Questions about your order? Want to partner with us?</p>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="relative z-20 -mt-20 pb-20 px-4">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Location -->
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:-translate-y-2 transition duration-300 border-b-4 border-emerald-600 group">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-6 text-2xl group-hover:bg-emerald-600 group-hover:text-white transition">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Visit Our Farm Store</h3>
                <p class="text-gray-500 mb-4 leading-relaxed">123 Market Street<br>Green City, GC 12345</p>
                <a href="#" class="text-emerald-600 font-semibold hover:text-emerald-800 flex items-center">
                    Get Directions <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>

            <!-- Phone -->
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:-translate-y-2 transition duration-300 border-b-4 border-emerald-600 group">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-6 text-2xl group-hover:bg-emerald-600 group-hover:text-white transition">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Call Us</h3>
                <p class="text-gray-500 mb-4 leading-relaxed">Mon-Sun: 7am - 9pm<br>Customer Support: 24/7</p>
                <a href="tel:+15551234567" class="text-emerald-600 font-semibold hover:text-emerald-800 flex items-center">
                    +1 (555) 123-4567 <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>

            <!-- Email -->
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:-translate-y-2 transition duration-300 border-b-4 border-emerald-600 group">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-6 text-2xl group-hover:bg-emerald-600 group-hover:text-white transition">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Email Us</h3>
                <p class="text-gray-500 mb-4 leading-relaxed">For inquiries and bulk orders.<br>We reply within 24 hours.</p>
                <a href="mailto:hello@freshmarket.com" class="text-emerald-600 font-semibold hover:text-emerald-800 flex items-center">
                    hello@freshmarket.com <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-emerald-600 font-bold tracking-widest uppercase text-sm">Contact Form</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Send us a Message</h2>
                <div class="w-20 h-1 bg-emerald-600 mx-auto mt-6 rounded-full"></div>
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
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-emerald-600 transition">First Name</label>
                            <input type="text" name="first_name" required class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-50 outline-none transition duration-300">
                        </div>
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-emerald-600 transition">Last Name</label>
                            <input type="text" name="last_name" required class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-50 outline-none transition duration-300">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-emerald-600 transition">Email Address</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-50 outline-none transition duration-300">
                        </div>
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-emerald-600 transition">Phone Number</label>
                            <input type="tel" name="phone" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-50 outline-none transition duration-300">
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-emerald-600 transition">Subject</label>
                        <div class="relative">
                            <select name="subject" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-50 outline-none transition duration-300 appearance-none cursor-pointer">
                                <option value="Order Inquiry">Order Inquiry</option>
                                <option value="Product Question">Product Question</option>
                                <option value="Wholesale Inquiry">Wholesale Inquiry</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                <i class="fas fa-chevron-down text-sm"></i>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 group-focus-within:text-emerald-600 transition">Message</label>
                        <textarea name="message" rows="5" required class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-50 outline-none transition duration-300 resize-none"></textarea>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-gradient-to-r from-emerald-600 to-green-500 text-white font-bold py-4 rounded-xl hover:shadow-lg hover:from-emerald-700 hover:to-green-600 transform hover:-translate-y-1 transition duration-300">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Map Section (Full Width Bottom) -->
    <section class="h-[400px] w-full relative grayscale hover:grayscale-0 transition duration-700">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.7010336255!2d-122.41941548529249!3d37.77492957975986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c6c8f4459%3A0xb10ed6d9b5050fa5!2sTwitter+HQ!5e0!3m2!1sen!2sus!4v1530664923396"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="absolute inset-0 w-full h-full"></iframe>
    </section>
@endsection