<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classification;

class CategoryController extends Controller
{
    //
    public function index() {
        return view('categories.index', [
            'classifications' => Classification::query()->with(['categories', 'categories' => fn($q) => $q->withCount('doors')->orderBy('doors_count', 'DESC')])->orderBy('id','ASC')->get()
        ]);
    }

    public function create(Classification $classification) {
        return view('categories.create', ['classification' => $classification]);
    }
}
