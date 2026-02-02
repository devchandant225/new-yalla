<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Jetski Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-white flex-shrink-0 hidden md:flex flex-col">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-blue-400">Jetski Admin</h1>
            </div>
            <nav class="flex-1 px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 border-l-4 border-blue-400' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.products.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.products.*') ? 'bg-slate-800 border-l-4 border-blue-400' : '' }}">
                    <i class="fas fa-box"></i>
                    <span>Products</span>
                </a>
                <a href="{{ route('admin.categories.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.categories.*') ? 'bg-slate-800 border-l-4 border-blue-400' : '' }}">
                    <i class="fas fa-tags"></i>
                    <span>Categories</span>
                </a>
                <a href="{{ route('admin.orders.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.orders.*') ? 'bg-slate-800 border-l-4 border-blue-400' : '' }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Orders</span>
                </a>
            </nav>
            <div class="p-4 border-t border-slate-800">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center space-x-3 p-3 w-full text-left hover:text-red-400 transition">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col">
            <!-- Top Header -->
            <header class="h-16 bg-white shadow-sm flex items-center justify-between px-8">
                <div class="flex items-center space-x-4">
                    <button class="md:hidden text-gray-600">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">{{ auth()->user()->name }}</span>
                    <div class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="p-8">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>