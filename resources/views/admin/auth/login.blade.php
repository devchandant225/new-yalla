<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Dubai Jetski</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .bg-royal-blue { background-color: #002366; }
        .text-royal-blue { color: #002366; }
        .border-royal-blue { border-color: #002366; }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white p-10 rounded-2xl shadow-xl border border-gray-100">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-royal-blue mb-2 tracking-tight">DUBAI <span class="text-blue-500">JETSKI</span></h1>
            <p class="text-gray-500">Admin Portal - Please enter your credentials</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition" placeholder="admin@dubaijetski.com" required>
            </div>

            <div class="mb-8">
                <div class="flex items-center justify-between mb-2">
                    <label class="text-sm font-semibold text-gray-700">Password</label>
                </div>
                <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-royal-blue focus:ring-2 focus:ring-blue-200 outline-none transition" placeholder="••••••••" required>
            </div>

            <button type="submit" class="w-full bg-royal-blue text-white font-bold py-4 rounded-xl hover:bg-blue-800 transition shadow-lg shadow-blue-100">
                Sign in to Dashboard
            </button>
        </form>

        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-royal-blue transition flex items-center justify-center">
                <i class="fas fa-arrow-left mr-2"></i> Back to Website
            </a>
        </div>
    </div>
</body>
</html>
