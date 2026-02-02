@extends('layouts.admin')

@section('title', 'Property Inquiries')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">From</th>
                    <th class="px-6 py-4">Property</th>
                    <th class="px-6 py-4">Date</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($inquiries as $inquiry)
                <tr class="hover:bg-gray-50 transition {{ $inquiry->is_read ? 'opacity-75' : 'font-bold' }}">
                    <td class="px-6 py-4">
                        @if(!$inquiry->is_read)
                            <span class="w-2 h-2 bg-blue-600 rounded-full inline-block"></span>
                        @else
                            <i class="fas fa-check text-green-500 text-xs"></i>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-gray-800">{{ $inquiry->name }}</div>
                        <div class="text-gray-500 text-xs font-normal">{{ $inquiry->email }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-blue-600 text-sm">{{ $inquiry->property->title }}</div>
                    </td>
                    <td class="px-6 py-4 text-gray-500 text-sm font-normal">
                        {{ $inquiry->created_at->diffForHumans() }}
                    </td>
                    <td class="px-6 py-4 text-right flex justify-end space-x-3">
                        <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="text-blue-600 hover:text-blue-800 transition">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:text-red-800 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-400 font-normal">No inquiries found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
        {{ $inquiries->links() }}
    </div>
</div>
@endsection
