@extends('layouts.admin')

@section('title', 'Order Details #' . $order->id)

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Order #{{ $order->id }}</h1>
    <a href="{{ route('admin.orders.index') }}" class="text-gray-600 hover:text-gray-800">
        <i class="fas fa-arrow-left mr-2"></i> Back to Orders
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Order Items -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
            <div class="p-6 border-b border-gray-100">
                <h2 class="font-bold text-lg">Items</h2>
            </div>
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4">Product</th>
                        <th class="px-6 py-4 text-center">Qty</th>
                        <th class="px-6 py-4 text-right">Price</th>
                        <th class="px-6 py-4 text-right">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($order->items as $item)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($item->product && $item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" class="w-10 h-10 object-cover rounded mr-3">
                                @endif
                                <div>
                                    <div class="font-medium">{{ $item->product ? $item->product->name : 'Product Deleted' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">{{ $item->quantity }}</td>
                        <td class="px-6 py-4 text-right">${{ number_format($item->price, 2) }}</td>
                        <td class="px-6 py-4 text-right font-bold">${{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-right font-bold">Total Amount:</td>
                        <td class="px-6 py-4 text-right font-bold text-lg text-blue-600">${{ number_format($order->total_amount, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Order Info & Status -->
    <div class="lg:col-span-1 space-y-6">
        <!-- Status Update -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="font-bold text-lg mb-4">Update Status</h2>
            <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Order Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Payment Status</label>
                    <select name="payment_status" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                        <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 font-bold">
                    Update Order
                </button>
            </form>
        </div>

        <!-- Customer Info -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="font-bold text-lg mb-4">Customer Details</h2>
            <div class="mb-4">
                <div class="text-xs text-gray-500 uppercase font-bold">Name</div>
                <div>{{ $order->user->name ?? 'Guest' }}</div>
            </div>
            <div class="mb-4">
                <div class="text-xs text-gray-500 uppercase font-bold">Email</div>
                <div>{{ $order->user->email ?? 'N/A' }}</div>
            </div>
            <div class="mb-4">
                <div class="text-xs text-gray-500 uppercase font-bold">Shipping Address</div>
                <div class="text-sm">{{ $order->shipping_address }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
