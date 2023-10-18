<?php

namespace App\Http\Controllers;

use App\Models\Door;
use Illuminate\Http\Request;
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

    // Store door data
    public function store(Request $request) {

        dd($request);

        $formFields = $request->validate([
            'name' => ['required', Rule::unique('doors', 'name')],
            'sku' => 'required',
            'img_location' => 'required' 
        ]);

        // if($request->hasFile('door_image')) {
        //     $doorFormFields['img_location'] = $request->file('door_image')->store('doors', 'public');
        // }
        //$formFields['user_id'] = auth()->id();
        $door = Door::create($formFields);
        $this->addCategories($request, $door);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    public function addCategories(Request $request, Door $door) {
        // Store Door's Categories
        $door->categories()->syncWithoutDetaching($request->categories);
        return 'Attached';
    }
}
