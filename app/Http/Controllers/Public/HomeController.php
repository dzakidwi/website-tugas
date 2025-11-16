<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimoni;
use App\Models\Faq;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->limit(3)->get();
        $testimonials = Testimoni::where('is_approved', true)->latest()->get();
        $faqs = Faq::orderBy('order')->get();

        return view('public.home-new', compact('categories', 'products', 'testimonials', 'faqs'));
    }

    public function about()
    {
        return view('public.about-new');
    }

    public function faq()
    {
        $faqs = Faq::orderBy('order')->get();
        return view('public.faq-new', compact('faqs'));
    }
}