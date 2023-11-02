<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classification;

class ClassificationController extends Controller
{
    // Create category view
    public function create() {

        // Return category create view with data
        return view('classifications.create');
    }

    // Store classification
    public function store(Request $request) {
        
        // Validate form input
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        // store classification to database
        $classification = Classification::create($formFields);

        // Redirect to category index page
        return redirect()->route('indexCategory')->with('message', $classification->name.' classification created successfully!');
    }

    // Edit Classification
    public function edit(Classification $classification) {
        return view('classifications.edit', ['classification'=> $classification]);
    }

    // Update Classification
    public function update(Request $request, Classification $classification) {
        
        // Validate form input
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        // Update classification
        $classification->update($formFields);

        // Redirect to category index page
        return redirect()->route('indexCategory')->with('message', $classification->name.' classification updated successfully!');
    }

    // Destroy Classification
    public function destroy(Classification $classification) {
        
        // Check to make sure there are no categories with this classification
        if(count($classification->categories) != 0) {
            abort(403, 'Unauthorized Action: There are ' . count($classification->categories) . ' doors attached to this category');
        }

        // Get classification name
        $classificationName = $classification->name;
        
        // Delete classification from database
        $classification->delete();
        
        // Redirect to category index page
        return redirect()->route('indexCategory')->with('message', $classificationName.' classification deleted successfully!');
    }
}