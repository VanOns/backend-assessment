<?php

namespace App\Http\Controllers;

use App\Models\DairyFarm;
use Illuminate\Http\Request;

class DairyFarmController extends Controller
{
    public function store(Request $request)
    {
        $dairyFarm = new DairyFarm([
            'name' => $request->name,
            'number_of_cows' => $request->number_of_cows,
            'milk_quality' => $request->milk_quality,
        ]);

        $dairyFarm->save();

        return redirect('/')->with('success', 'Dairy farm created successfully!');
    }
}
