<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // Show all testimonials
    public function index() {

        return view('testimonials.index', [
            'testimonials' => Testimonial::latest()->paginate(25)
        ]);
    }
}
