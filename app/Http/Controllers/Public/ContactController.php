<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('public.contact-new');
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone ?? '',
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return back()->with('success', 'Pesan Anda telah dikirim. Terima kasih!');
    }

    public function testimonial()
    {
        $testimonials = Testimoni::where('is_approved', true)->latest()->get();
        return view('public.testimonial-new', compact('testimonials'));
    }

    public function storeTestimonial(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'nullable|string',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $testimoni = new Testimoni();
        $testimoni->name = $request->name;
        $testimoni->location = $request->location;
        $testimoni->email = $request->email ?? '';
        $testimoni->message = $request->message;
        $testimoni->rating = $request->rating;
        $testimoni->is_approved = false;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('testimonials', 'public');
            $testimoni->image = $path;
        }

        $testimoni->save();

        return back()->with('success', 'Testimoni Anda akan ditampilkan setelah disetujui admin. Terima kasih!');
    }
}