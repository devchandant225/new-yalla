@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <h1 class="text-3xl font-bold text-gray-900">Profile Settings</h1>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>
                        <p class="mt-1 text-sm text-gray-600">Update your account's profile information and email address.</p>
                    </header>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="name">Name</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full px-4 py-2 border" id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                            @error('name') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="email">Email</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full px-4 py-2 border" id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                            @error('email') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Save</button>

                            @if (session('status') === 'profile-updated')
                                <p class="text-sm text-gray-600">Saved.</p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
