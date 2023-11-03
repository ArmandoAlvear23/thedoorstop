<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // Get and show all testimonials
    public function index() {

        return view('testimonials.index', [
            'testimonials' => Testimonial::latest()->paginate(25)
        ]);
    }

    // Get create testimonial view
    public function create() {
        return view('testimonials.create');
    }

    // Store testimonial
    public function store(Request $request) {
        
        // Validate form input
        $formFields = $request->validate([
            'name' => 'required',
            'testimonial' => 'required'
        ]);

        // Store testimonial to database
        Testimonial::create($formFields);

        // Redirect to testimonials index page
        return redirect()->route('indexTestimonial')->with('message', 'Testimonial added successfully!');
    }

    // Edit testimonial
    public function edit(Testimonial $testimonial) {

        return view('testimonials.edit', ['testimonial' => $testimonial]);
    }

    // Update testimonial
    public function update(Request $request, Testimonial $testimonial) {
        
        // Validate form input
        $formFields = $request->validate([
            'name' => 'required',
            'testimonial' => 'required'
        ]);

        // Update testimonial in database
        $testimonial->update($formFields);

        // Redirect to testimonials index page
        return redirect()->route('indexTestimonial')->with('message', 'Testimonial updated successfully!');
    }

    // Delete testimonial
    public function destroy(Testimonial $testimonial) {
        
        // Delete testimonial from database
        $testimonial->delete();

        // Redirect to testimonials index page
        return redirect()->route('indexTestimonial')->with('message', 'Testimonial deleted successfully!');
    }
}
