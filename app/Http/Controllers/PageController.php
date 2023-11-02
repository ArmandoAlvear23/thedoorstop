<?php

namespace App\Http\Controllers;

use App\Models\Door;
use Illuminate\Http\Request;
use App\Models\Classification;

class PageController extends Controller
{
    // Get home data and page view
    public function index() {
        
        // Get all doors with home promotion
        $homeDoors = Door::query()->with(['promotions', 'categories'])->whereHas('promotions', fn($query) => $query->where('name', 'home'))->get();
        
        // Get 14 random doors if there are no home doors
        if(count($homeDoors) == 0)
        {
            $homeDoors = Door::query()->inRandomOrder()->limit(14)->get();
        }

        return view('pages.index', [
            'heroImages' => Door::query()->with('promotions')->whereHas('promotions', fn($query) => $query->where('name', 'hero'))->get(['img_location']),
            'homeDoors' => $homeDoors,
            'classifications' => Classification::query()->with(['categories', 'categories' => fn($q) => $q->withCount('doors')->orderBy('doors_count', 'DESC')])->orderBy('id','ASC')->get(),
            'activeFilters' => array()
        ]);
    }
}
