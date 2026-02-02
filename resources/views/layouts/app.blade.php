<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'FreshMarket') }} - Organic & Fresh Groceries</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Custom Grocery Theme Colors */
        .text-brand { color: #059669; } /* emerald-600 */
        .bg-brand { background-color: #059669; }
        .bg-brand-dark { background-color: #047857; } /* emerald-700 */
        .border-brand { border-color: #059669; }
        .hover-text-brand:hover { color: #059669; }
        .hover-bg-brand:hover { background-color: #059669; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    <nav class="bg-white text-gray-800 shadow-sm sticky top-0 z-50 border-b border-gray-100" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                        <div class="bg-emerald-100 text-emerald-600 p-2 rounded-lg group-hover:bg-emerald-600 group-hover:text-white transition duration-300">
                            <i class="fas fa-leaf text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold tracking-tight text-gray-900 group-hover:text-emerald-700 transition">
                            Fresh<span class="text-emerald-600">Market</span>
                        </span>
                    </a>
                </div>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="font-medium hover:text-emerald-600 transition {{ request()->routeIs('home') ? 'text-emerald-600' : 'text-gray-600' }}">Home</a>
                    <a href="{{ route('shop') }}" class="font-medium hover:text-emerald-600 transition {{ request()->routeIs('shop') ? 'text-emerald-600' : 'text-gray-600' }}">Shop</a>
                    <a href="{{ route('about') }}" class="font-medium hover:text-emerald-600 transition {{ request()->routeIs('about') ? 'text-emerald-600' : 'text-gray-600' }}">About</a>
                    <a href="{{ route('contact') }}" class="font-medium hover:text-emerald-600 transition {{ request()->routeIs('contact') ? 'text-emerald-600' : 'text-gray-600' }}">Contact</a>
                    
                    @auth
                        <div class="relative group" x-data="{ userOpen: false }">
                            <button @click="userOpen = !userOpen" @click.away="userOpen = false" class="flex items-center space-x-2 text-gray-600 hover:text-emerald-600 transition">
                                <span class="font-medium">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div x-show="userOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50" style="display: none;">
                                <a href="{{ route('orders.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">My Orders</a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">Profile</a>
                                @if(auth()->user()->is_admin)
                                    <div class="border-t border-gray-100 my-1"></div>
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm font-bold text-emerald-600 hover:bg-emerald-50">Admin Dashboard</a>
                                @endif
                                <div class="border-t border-gray-100 my-1"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="font-medium text-gray-600 hover:text-emerald-600 transition">Login</a>
                        <a href="{{ route('register') }}" class="bg-emerald-600 text-white px-5 py-2 rounded-full font-bold text-sm hover:bg-emerald-700 transition shadow-md hover:shadow-lg">Sign Up</a>
                    @endauth

                    <a href="{{ route('cart.index') }}" class="relative group p-2">
                        <i class="fas fa-shopping-basket text-2xl text-gray-600 group-hover:text-emerald-600 transition"></i>
                        @if(session('cart'))
                            <span class="absolute top-0 right-0 bg-red-500 text-white text-[10px] font-bold w-5 h-5 flex items-center justify-center rounded-full border-2 border-white shadow-sm">
                                {{ array_sum(session('cart')) }}
                            </span>
                        @endif
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center space-x-4">
                    <a href="{{ route('cart.index') }}" class="relative text-gray-600">
                        <i class="fas fa-shopping-basket text-2xl"></i>
                        @if(session('cart'))
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold w-4 h-4 flex items-center justify-center rounded-full">
                                {{ array_sum(session('cart')) }}
                            </span>
                        @endif
                    </a>
                    <button @click="open = !open" class="text-gray-600 focus:outline-none p-2 rounded-md hover:bg-gray-100">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" class="md:hidden bg-white border-t border-gray-100 px-4 py-4 space-y-3 shadow-lg">
            <a href="{{ route('home') }}" class="block py-2 text-gray-600 font-medium hover:text-emerald-600 hover:bg-emerald-50 rounded-lg px-3">Home</a>
            <a href="{{ route('shop') }}" class="block py-2 text-gray-600 font-medium hover:text-emerald-600 hover:bg-emerald-50 rounded-lg px-3">Shop</a>
            <a href="{{ route('about') }}" class="block py-2 text-gray-600 font-medium hover:text-emerald-600 hover:bg-emerald-50 rounded-lg px-3">About</a>
            <a href="{{ route('contact') }}" class="block py-2 text-gray-600 font-medium hover:text-emerald-600 hover:bg-emerald-50 rounded-lg px-3">Contact</a>
            
            <div class="border-t border-gray-100 pt-2">
                @auth
                    <a href="{{ route('orders.index') }}" class="block py-2 text-gray-600 font-medium hover:text-emerald-600 px-3">My Orders</a>
                    <a href="{{ route('profile.edit') }}" class="block py-2 text-gray-600 font-medium hover:text-emerald-600 px-3">Profile</a>
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="block py-2 text-emerald-600 font-bold px-3">Admin Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left py-2 text-red-600 font-medium px-3">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block py-2 text-gray-600 font-medium px-3">Login</a>
                    <a href="{{ route('register') }}" class="block py-2 text-emerald-600 font-bold px-3">Sign Up</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="min-h-screen">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-1">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 mb-6">
                        <div class="bg-emerald-500 text-white p-2 rounded-lg">
                            <i class="fas fa-leaf text-lg"></i>
                        </div>
                        <span class="text-2xl font-bold tracking-tight text-white">
                            Fresh<span class="text-emerald-400">Market</span>
                        </span>
                    </a>
                    <p class="text-gray-400 leading-relaxed text-sm mb-6">
                        Delivering the freshest organic produce and grocery essentials directly from local farms to your doorstep. Quality you can taste.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-emerald-600 hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-emerald-600 hover:text-white transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-emerald-600 hover:text-white transition"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white">Shop</h4>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li><a href="{{ route('shop') }}" class="hover:text-emerald-400 transition">All Products</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition">Fresh Fruits</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition">Vegetables</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition">Dairy & Eggs</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition">Bakery</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-6 text-white">Company</h4>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li><a href="{{ route('about') }}" class="hover:text-emerald-400 transition">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-emerald-400 transition">Contact</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition">Careers</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition">Terms of Service</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-6 text-white">Contact</h4>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-emerald-500"></i>
                            <span>123 Market Street<br>Green City, GC 12345</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-3 text-emerald-500"></i>
                            <span>+1 (555) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-emerald-500"></i>
                            <span>hello@freshmarket.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 text-center text-gray-500 text-sm">
                <p>&copy; {{ date('Y') }} FreshMarket. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
