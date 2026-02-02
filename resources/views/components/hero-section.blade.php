<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gray-900">
    <!-- Background Image with Cinematic Zoom -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1512453979798-5ea904f8486d?auto=format&fit=crop&w=1920&q=100" 
             alt="Luxury Dubai Living" 
             class="w-full h-full object-cover animate-slow-zoom">
        <!-- Overlay for brightness and gradient -->
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/60 via-transparent to-gray-900/90"></div>
    </div>

    <style>
        @keyframes slowZoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }
        .animate-slow-zoom {
            animation: slowZoom 20s linear infinite alternate;
        }
    </style>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 md:pt-48">
        <div class="text-center mb-12 animate-fade-in-up">
            <h1 class="text-5xl md:text-7xl font-serif font-bold text-white mb-6 leading-tight">
                Experience <span class="text-white italic underline decoration-1 decoration-white/30 underline-offset-8">Luxury</span> Living<br>
                in the Heart of Dubai
            </h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto font-light">
                Discover an exclusive collection of premier properties in the world's most dynamic city.
            </p>
        </div>

        <!-- Search Box -->
        <div class="bg-black/30 backdrop-blur-md border border-white/20 p-4 rounded-3xl max-w-4xl mx-auto shadow-2xl animate-fade-in-up" style="animation-delay: 0.2s;">
            <form action="{{ route('properties.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-white/60"></i>
                        <input type="text" name="search" placeholder="City, Community or Building..." 
                               class="w-full bg-white/5 border border-white/10 rounded-xl py-4 pl-12 pr-4 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white focus:bg-white/10 transition">
                    </div>
                </div>
                <div class="md:w-48">
                    <div class="relative">
                        <i class="fas fa-home absolute left-4 top-1/2 transform -translate-y-1/2 text-white/60"></i>
                        <select name="type" class="w-full bg-white/5 border border-white/10 rounded-xl py-4 pl-12 pr-4 text-white focus:outline-none focus:ring-2 focus:ring-white focus:bg-white/10 transition appearance-none cursor-pointer">
                            <option value="" class="text-gray-900">Property Type</option>
                            <option value="apartment" class="text-gray-900">Apartment</option>
                            <option value="villa" class="text-gray-900">Villa</option>
                            <option value="penthouse" class="text-gray-900">Penthouse</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="bg-white hover:bg-black hover:text-white text-black border border-white font-bold py-4 px-8 rounded-xl transition duration-300 transform hover:scale-105 shadow-lg">
                    Search
                </button>
            </form>
        </div>
        
        <div class="mt-16 text-center text-white/60 animate-fade-in-up" style="animation-delay: 0.4s;">
            <p class="text-sm uppercase tracking-widest mb-4">Trusted By</p>
            <div class="flex justify-center gap-8 md:gap-16 opacity-70 grayscale hover:grayscale-0 transition duration-500">
                <!-- Simple text logos for demo -->
                <span class="text-xl font-serif font-bold">EMAAR</span>
                <span class="text-xl font-serif font-bold">DAMAC</span>
                <span class="text-xl font-serif font-bold">NAKHEEL</span>
                <span class="text-xl font-serif font-bold">MERAAS</span>
            </div>
        </div>
    </div>
</section>