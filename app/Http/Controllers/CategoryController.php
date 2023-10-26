<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Classification;

class CategoryController extends Controller
{
    // Category list view
    public function index() {
        return view('categories.index', [
            'classifications' => Classification::query()->with(['categories', 'categories' => fn($q) => $q->withCount('doors')->orderBy('doors_count', 'DESC')])->orderBy('id','ASC')->get()
        ]);
    }

    // Create category view
    public function create(Classification $classification) {
        $dbClassificationList = Classification::query()->get();
        return view('categories.create', ['classification' => $classification])->with('dbClassificationList', $dbClassificationList);
    }

    // Store category data
    public function store(Request $request) {

        $formFields = $request->validate([
            'name' => 'required',
            'classification_id' => 'required'
        ]);

        Category::create($formFields);

        return redirect('/internal/door/categories')->with('message', 'Category created successfully!');
    }

    // Edit category view
    public function edit(Category $category) {
        $dbClassificationList = Classification::query()->get();
        return view('categories.edit', ['category' => $category])->with('dbClassificationList', $dbClassificationList);
    }

     // Update category data
     public function update(Request $request, Category $category) {

        $formFields = $request->validate([
            'name' => 'required',
            'classification_id' => 'required'
        ]);

        $category->update($formFields);
        return redirect('/internal/door/categories')->with('message', 'Category updated successfully!');
    }

    // Destroy categeroy record in database
    public function destroy(Category $category) {
        
         if($category->doors_count != 0) {
            abort(403, 'Unauthorized Action: There are ' . $category->doors_count . ' doors attached to this category');
        }
        
        $category->delete();
        return redirect('/internal/door/categories')->with('message', 'Category deleted successfully!');
    }
}
