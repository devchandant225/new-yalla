@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[50vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=1920&q=80"
                 alt="Contact Dubai Jetski"
                 class="w-full h-full object-cover brightness-50">
        </div>
        <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
            <span class="text-white font-bold tracking-widest uppercase text-sm mb-4 block">Get In Touch</span>
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Ready for Your <span class="text-blue-300 italic">Water Adventure?</span>
            </h1>
        </div>
    </section>

    <!-- Contact Grid -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
                <!-- Info Card 1 -->
                <div class="bg-gray-50 p-8 text-center border border-gray-100 hover:shadow-xl transition duration-500 group">
                    <div class="w-16 h-16 mx-auto bg-royal-blue rounded-full flex items-center justify-center mb-6 text-white group-hover:bg-blue-800 transition duration-300">
                        <i class="fas fa-map-marker-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Our Location</h3>
                    <p class="text-gray-600 mb-4">Jumeirah Beach Residence<br>Dubai, UAE</p>
                    <a href="https://maps.google.com/?q=jumeirah+beach+dubai" class="text-royal-blue font-bold uppercase text-xs tracking-widest hover:underline">Get Directions</a>
                </div>

                <!-- Info Card 2 -->
                <div class="bg-gray-50 p-8 text-center border border-gray-100 hover:shadow-xl transition duration-500 group">
                    <div class="w-16 h-16 mx-auto bg-royal-blue rounded-full flex items-center justify-center mb-6 text-white group-hover:bg-blue-800 transition duration-300">
                        <i class="fas fa-phone text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Call Us</h3>
                    <p class="text-gray-600 mb-4">Daily from 8am to 7pm<br>Beach hours: 9am to 6pm</p>
                    <a href="tel:+971500000000" class="text-2xl font-bold text-royal-blue hover:text-blue-800 transition">+971 50 000 0000</a>
                </div>

                <!-- Info Card 3 -->
                <div class="bg-gray-50 p-8 text-center border border-gray-100 hover:shadow-xl transition duration-500 group">
                    <div class="w-16 h-16 mx-auto bg-royal-blue rounded-full flex items-center justify-center mb-6 text-white group-hover:bg-blue-800 transition duration-300">
                        <i class="fab fa-whatsapp text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">WhatsApp</h3>
                    <p class="text-gray-600 mb-4">Instant replies for bookings<br>and inquiries</p>
                    <a href="https://wa.me/971500000000" class="text-2xl font-bold text-royal-blue hover:text-blue-800 transition">Chat Now</a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Form -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Send Us a Message</h2>

                    @if(session('success'))
                        <div class="mb-8 p-4 bg-green-100 text-green-700 border border-green-400 text-sm font-bold rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">First Name</label>
                                <input type="text" name="first_name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Last Name</label>
                                <input type="text" name="last_name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition">
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Email Address</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Phone Number</label>
                            <input type="tel" name="phone" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Subject</label>
                            <select name="subject" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition">
                                <option value="Jetski Booking">Jetski Booking</option>
                                <option value="Group Booking">Group Booking</option>
                                <option value="Event Inquiry">Event Inquiry</option>
                                <option value="General Inquiry">General Inquiry</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Message</label>
                            <textarea name="message" rows="5" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-royal-blue text-white font-bold py-4 rounded-xl hover:bg-blue-800 transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Map -->
                <div class="h-full min-h-[500px] bg-gray-200 rounded-2xl overflow-hidden shadow-lg">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.7010336255!2d55.27928331475928!3d25.09656838396748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6b7b6b7b6b7b%3A0x7b7b7b7b7b7b7b7b!2sJumeirah%20Beach%20Residence%2C%20Dubai!5e0!3m2!1sen!2sae!4v1610000000000!5m2!1sen!2sae"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="absolute inset-0 w-full h-full"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection