@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm">
    <h1 class="text-2xl font-bold mb-6">Create New Category</h1>
    
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" name="name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea name="description" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" rows="3"></textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Image</label>
            <input type="file" name="image" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 font-bold">Create Category</button>
    </form>
</div>
@endsection
