<?php

namespace App\Http\Controllers;

use App\Models\CheeseArtisan;
use App\Models\DairyFarm;

class HomeController extends Controller
{
    public function __invoke()
    {
        $dairyFarms = DairyFarm::all();
        $cheeseArtisans = CheeseArtisan::all();

        return view('home', compact('dairyFarms', 'cheeseArtisans'));
    }
}
