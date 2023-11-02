<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Classification;

class CategoryController extends Controller
{
    // Category list view
    public function index() {

        // Return category index view with data
        return view('categories.index', [
            'classifications' => Classification::query()->with(['categories', 'categories' => fn($q) => $q->withCount('doors')->orderBy('doors_count', 'DESC')])->orderBy('id','ASC')->get()
        ]);
    }

    // Create category view
    public function create(Classification $classification) {

        // Get list of all classifications from the database
        $dbClassificationList = Classification::query()->get();

        // Return category create view with data
        return view('categories.create', ['classification' => $classification])->with('dbClassificationList', $dbClassificationList);
    }

    // Store category data
    public function store(Request $request) {

        // Validate form input
        $formFields = $request->validate([
            'name' => 'required',
            'classification_id' => 'required'
        ]);

        // Store category to database
        $category = Category::create($formFields);

        // Redirect to category index page
        return redirect()->route('indexCategory')->with('message', $category->name.' category created successfully!');
    }

    // Edit category view
    public function edit(Category $category) {

        // Get list of all classifications from the database
        $dbClassificationList = Classification::query()->get();
        
        // Return edit category view with data
        return view('categories.edit', ['category' => $category])->with('dbClassificationList', $dbClassificationList);
    }

     // Update category data
     public function update(Request $request, Category $category) {

        // Validate form input
        $formFields = $request->validate([
            'name' => 'required',
            'classification_id' => 'required'
        ]);

        // Update category
        $category->update($formFields);

        // Redirect to category index page
        return redirect()->route('indexCategory')->with('message', $category->name.' category updated successfully!');
    }

    // Delete categeroy in database
    public function destroy(Category $category) {
        
        // Check to make sure there are no doors with this category
         if($category->doors_count != 0) {
            abort(403, 'Unauthorized Action: There are ' . $category->doors_count.' doors attached to this category');
        }

        // Get category name
        $categoryName = $category->name;

        // Delete category
        $category->delete();

        // Redirect to category index page
        return redirect()->route('indexCategory')->with('message', $categoryName.' category deleted successfully!');
    }
}
