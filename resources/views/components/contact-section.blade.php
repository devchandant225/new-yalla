<section id="contact" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div>
                <span class="text-black font-bold tracking-widest uppercase text-sm mb-4 block">Get in Touch</span>
                <h2 class="text-4xl md:text-5xl font-serif font-bold text-gray-900 mb-8">We'd Love to Hear From You</h2>
                <p class="text-gray-600 text-lg mb-12 leading-relaxed">
                    Whether you are looking to buy, sell, or rent, our team of experts is ready to assist you. Visit our office or send us a message.
                </p>
                
                <div class="space-y-8">
                    <div class="flex items-start space-x-6">
                        <div class="w-12 h-12 border border-gray-200 flex items-center justify-center text-gray-900">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-lg uppercase tracking-wide">Headquarters</h4>
                            <p class="text-gray-600 mt-2">Level 42, Boulevard Plaza Tower 1,<br>Downtown Dubai, UAE</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-6">
                        <div class="w-12 h-12 border border-gray-200 flex items-center justify-center text-gray-900">
                            <i class="fas fa-phone-alt text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-lg uppercase tracking-wide">Phone</h4>
                            <p class="text-gray-600 mt-2">+971 4 123 4567</p>
                            <p class="text-gray-500 text-sm">Mon-Fri 9am-6pm</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-6">
                        <div class="w-12 h-12 border border-gray-200 flex items-center justify-center text-gray-900">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-lg uppercase tracking-wide">Email</h4>
                            <p class="text-gray-600 mt-2">info@geminiestate.com</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 p-10 md:p-14 border border-gray-100">
                @if(session('success'))
                    <div class="mb-8 p-4 bg-gray-100 text-black border border-black/10 text-sm font-bold">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-900 uppercase tracking-widest mb-2">First Name</label>
                            <input type="text" name="first_name" required class="w-full bg-white border border-gray-200 p-4 text-gray-900 focus:outline-none focus:border-black transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-900 uppercase tracking-widest mb-2">Last Name</label>
                            <input type="text" name="last_name" required class="w-full bg-white border border-gray-200 p-4 text-gray-900 focus:outline-none focus:border-black transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-900 uppercase tracking-widest mb-2">Email Address</label>
                        <input type="email" name="email" required class="w-full bg-white border border-gray-200 p-4 text-gray-900 focus:outline-none focus:border-black transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-900 uppercase tracking-widest mb-2">Message</label>
                        <textarea name="message" rows="5" required class="w-full bg-white border border-gray-200 p-4 text-gray-900 focus:outline-none focus:border-black transition"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-black text-white font-bold py-4 uppercase tracking-widest hover:bg-white hover:text-black border border-black transition duration-300">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>