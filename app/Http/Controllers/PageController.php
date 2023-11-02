<?php

namespace App\Http\Controllers;

use App\Models\Door;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index() {
        return view('pages.index', [
            'heroImages' => Door::query()->with('promotions')->whereHas('promotions', fn($query) => $query->where('name', 'hero'))->get(['img_location'])
        ]);
    }
}
