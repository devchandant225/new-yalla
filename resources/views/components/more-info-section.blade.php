<section class="py-20 bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-emerald-400 font-bold tracking-widest uppercase text-sm mb-4 block">Our Commitment</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-6 italic">Sustainable & Local</h2>
                <p class="text-gray-400 text-lg mb-6 leading-relaxed">
                    We believe in supporting local farmers and reducing our carbon footprint. Every purchase you make helps support a sustainable ecosystem of local producers.
                </p>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center text-gray-300">
                        <i class="fas fa-check-circle text-emerald-500 mr-3"></i> 100% Organic Certified
                    </li>
                    <li class="flex items-center text-gray-300">
                        <i class="fas fa-check-circle text-emerald-500 mr-3"></i> Support Local Farmers
                    </li>
                    <li class="flex items-center text-gray-300">
                        <i class="fas fa-check-circle text-emerald-500 mr-3"></i> Eco-Friendly Packaging
                    </li>
                    <li class="flex items-center text-gray-300">
                        <i class="fas fa-check-circle text-emerald-500 mr-3"></i> Carbon Neutral Delivery
                    </li>
                </ul>
                <a href="{{ route('about') }}" class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-full font-bold transition">
                    Learn About Our Values
                </a>
            </div>
            <div class="relative">
                <div class="absolute inset-0 bg-emerald-600 transform translate-x-4 translate-y-4 rounded-2xl"></div>
                <img src="https://images.unsplash.com/photo-1595855709915-f5d72ca08d87?q=80&w=1000&auto=format&fit=crop" 
                     alt="Farmer holding vegetables" 
                     class="relative rounded-2xl shadow-2xl z-10 w-full h-auto object-cover grayscale hover:grayscale-0 transition duration-700">
            </div>
        </div>
    </div>
</section>