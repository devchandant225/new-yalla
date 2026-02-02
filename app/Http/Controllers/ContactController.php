<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // We can reuse the Inquiry model or create a Message model. 
        // For simplicity, let's use Inquiry without a property_id.
        Inquiry::create([
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'message' => '[' . ($validated['subject'] ?? 'General') . '] ' . $validated['message'],
        ]);

        return back()->with('success', 'Thank you for contacting us. We will get back to you shortly.');
    }
}