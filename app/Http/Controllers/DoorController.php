<?php

namespace App\Http\Controllers;

use App\Models\Door;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Models\Classification;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class DoorController extends Controller
{
    // Get and show all doors
    public function index() {
        return view('doors.index', [
            'doors' => Door::latest()->filter(request(['category', 'promotion', 'search']))->get(),
            'classifications' => Classification::query()->with(['categories', 'categories' => fn($q) => $q->withCount('doors')->orderBy('doors_count', 'DESC')])->orderBy('id','ASC')->get(),
            'activeFilters' => request(['category','promotion'])
        ]);
    }

    // Get create door view
    public function create() {
        $classifications = Classification::query()->with(['categories', 'categories' => fn($q) => $q->withCount('doors')->orderBy('doors_count', 'DESC')])->orderBy('id','ASC')->get();
        $dbPromotionList = Promotion::query()->get();
        return view('doors.create')
            ->with('classifications', $classifications)
            ->with('dbPromotionList', $dbPromotionList);
    }

    // Store door data
    public function store(Request $request) {

        $formFields = $request->validate([
            'name' => ['required', Rule::unique('doors', 'name')],
            'description' => '',
            'photo' => 'required'
        ]);
        
        if($request->hasFile('photo')) {
            $formFields['img_location'] = 'storage/'.$request->file('photo')->store('doors', 'public');
        }

        // Create door with form data
        $door = Door::create($formFields);
        
        // Add door categories
        $this->addCategories($request, $door);

        // Add door promotions
        $this->addPromotions($request, $door);

        // Return to door index page
        return redirect()->route('indexDoor')->with('message', 'Door ['.$door->name.'] uploaded successfully!');
    }

    // Get edit door view
    public function edit(Door $door) {
        $classifications = Classification::query()->with(['categories'])->orderBy('id','ASC')->get();
        $dbPromotionList = Promotion::query()->get();
        return view('doors.edit', ['door' => $door])
            ->with('classifications', $classifications)
            ->with('dbPromotionList', $dbPromotionList);
    }

    // Update door
    public function update(Request $request, Door $door) {

        $formFields = $request->validate([
            'name' => 'required',
            'description' => ''
        ]);

        if($request->hasFile('photo')) {
            // Delete old photo file
            if(File::exists(public_path($door->img_location))){
                File::delete(public_path($door->img_location));
            }
            // Store new photo file and get location of new file
            $formFields['img_location'] = 'storage/'.$request->file('photo')->store('doors', 'public');
        }

        // Update door with new data
        $door->update($formFields);

        // Update door categories
        $this->addCategories($request, $door);

        // Update door promotions
        $this->addPromotions($request, $door);

        // Return to door index page
        return redirect()->route('indexDoor')->with('message', 'Door ['.$door->name.'] updated successfully!');
    }

    // Delete door
    public function destroy(Door $door) {

        // Get door name for delete message
        $doorName = $door->name;

        // Delete photo file
        if(File::exists(public_path($door->img_location))){
            File::delete(public_path($door->img_location));
        }
        
        // Delete door from database
        $door->delete();
        
        // Return to door index page
        return redirect()->route('indexDoor')->with('message', 'Door ['.$doorName.'] deleted succesfully!');
    }

    // Get single door view
    public function show(Door $door) {
        return view('doors.show', [
            'door' => $door
        ]);
    }

    // Store door categories
    public function addCategories(Request $request, Door $door) {
        
        $door->categories()->sync($request->categories);
    }

    // Store door promotions
    public function addPromotions(Request $request, Door $door) {
       
        $door->promotions()->sync($request->promotions);
    }

}
