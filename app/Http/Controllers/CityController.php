<?php

namespace App\Http\Controllers;

use App\Models\City;
use Inertia\Inertia;

class CityController extends Controller
{
    public function index(City $city)
    {

        return Inertia::render('City/Index')->with([
            'city' => $city,
        ]);
    }
}
