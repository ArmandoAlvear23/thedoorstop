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

    // Edit Classification
    public function edit(Classification $classification) {
        return view('classifications.edit', ['classification'=> $classification]);
    }

    // Update Classification
    public function update(Request $request, Classification $classification) {
        
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        $classification->update($formFields);

        return redirect('/internal/door/categories')->with('message', 'Classification updated successfully!');
    }
}
