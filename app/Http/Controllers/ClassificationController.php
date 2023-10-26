<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classification;

class ClassificationController extends Controller
{
    // Create category view
    public function create() {
        return view('classifications.create');
    }

    // Store classification
    public function store(Request $request) {
        
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        Classification::create($formFields);

        return redirect('internal/door/categories')->with('message', 'Classification created successfully!');
    }
}
