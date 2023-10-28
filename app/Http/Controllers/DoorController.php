<?php

namespace App\Http\Controllers;

use App\Models\Door;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Classification;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class DoorController extends Controller
{
    // Get and show all doors
    public function index() {
        return view('doors.index', [
            'doors' => Door::latest()->filter(request(['category', 'search']))->paginate(5),
            'classifications' => Classification::query()->with(['categories', 'categories' => fn($q) => $q->withCount('doors')->orderBy('doors_count', 'DESC')])->orderBy('id','ASC')->get(),
            'activeFilters' => request(['category'])
        ]);
    }

    // Get create door view
    public function create() {
        $classifications = Classification::query()->with(['categories', 'categories' => fn($q) => $q->withCount('doors')->orderBy('doors_count', 'DESC')])->orderBy('id','ASC')->get();
        return view('doors.create')->with('classifications', $classifications);
    }

    // Store door data
    public function store(Request $request) {

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

    // Get edit door view
    public function edit(Door $door) {
        $classifications = Classification::query()->with(['categories'])->orderBy('id','ASC')->get();
        return view('doors.edit', ['door' => $door])->with('classifications', $classifications);
    }

    // Update door
    public function update(Request $request, Door $door) {

        $formFields = $request->validate([
            'name' => 'required',
            'sku' => 'required'
        ]);

        if($request->hasFile('photo')) {
            // Delete old photo file
            if(File::exists(public_path('storage/'.$door->img_location))){
                File::delete(public_path('storage/'.$door->img_location));
            }
            // Store new photo file and get location of new file
            $formFields['img_location'] = $request->file('photo')->store('doors', 'public');
        }

        // Update door with new data
        $door->update($formFields);

        // Update door categories
        $this->addCategories($request, $door);

        return back();
        //return redirect('/')->with('message', 'Door created successfully!');
    }

    public function addCategories(Request $request, Door $door) {
       
        // Store Door's Categories
        $door->categories()->sync($request->categories);
    }

}
