<?php

namespace App\Http\Controllers;

use App\Models\Door;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Classification;
use Illuminate\Validation\Rule;

class DoorController extends Controller
{
    // Get and show all doors
    public function index() {
        return view('doors.index', [
            'heading' => 'Latest Doors',
            'doors' => Door::latest()->filter(request(['category']))->paginate(8)
        ]);
    }

    // Get create door view
    public function create() {
        $classifications = Classification::query()->with(['categories', 'categories' => fn($q) => $q->withCount('doors')->orderBy('doors_count', 'DESC')])->orderBy('id','ASC')->get();
        return view('doors.create')->with('classifications', $classifications);
    }

    // Store door data
    public function store(Request $request) {

       // dd($request);

        $formFields = $request->validate([
            'name' => ['required', Rule::unique('doors', 'name')],
            'sku' => 'required',
            'photo' => 'required'
        ]);
        
        if($request->hasFile('photo')) {
            $formFields['img_location'] = $request->file('photo')->store('doors', 'public');
        }

        $door = Door::create($formFields);
        
        $this->addCategories($request, $door);

        return redirect('/')->with('message', 'Door created successfully!');
    }

    public function addCategories(Request $request, Door $door) {
       
        // Store Door's Categories
        if($request->categories) {
            
            $categoryArr = explode(',', $request->categories);

            foreach($categoryArr as $category) {
                
                $door->categories()->syncWithoutDetaching($category);
            }
        }
    }

}
