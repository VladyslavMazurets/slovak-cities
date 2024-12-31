<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CityController extends Controller
{
    public function index(City $city)
    {

        return Inertia::render('City/Index')->with([
            'city' => $city,
        ]);
    }

    public function search(Request $request)
    {
        $searchQuery = $request->searchCity;

        $cities = City::where('name', 'like', '%'.$searchQuery.'%')->get();

        return Inertia::render('City/Search')->with([
            'searchQuery' => $searchQuery,
            'cities' => $cities,
        ]);
    }
}
