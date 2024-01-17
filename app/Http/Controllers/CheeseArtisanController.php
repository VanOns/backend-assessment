<?php

namespace App\Http\Controllers;

use App\Models\CheeseArtisan;
use Illuminate\Http\Request;

class CheeseArtisanController extends Controller
{
    public function store(Request $request)
    {
        $cheeseArtisan = new CheeseArtisan([
            'name' => $request->name,
            'rating' => $request->rating,
            'production_capacity' => $request->production_capacity,
        ]);

        $cheeseArtisan->save();

        return redirect('/')->with('success', 'Cheese artisan created successfully!');
    }
}
