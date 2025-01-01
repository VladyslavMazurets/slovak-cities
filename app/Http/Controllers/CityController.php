<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CityController extends Controller
{
    const CITIES_PER_PAGE = 10;

    public function index(City $city)
    {
        return Inertia::render('City/Index')->with([
            'city' => $city,
        ]);
    }

    public function autocomplete(Request $request)
    {
        $searchQuery = $request->searchCity;
        $cities = City::where('name', 'like', '%'.$searchQuery.'%')->limit(5)->get();

        return response()->json($cities);
    }

    public function search(Request $request)
    {
        $searchQuery = $request->searchCity;
        $page = $request->input('page', 1);

        $cities = City::where('name', 'like', '%'.$searchQuery.'%')->simplePaginate(self::CITIES_PER_PAGE, ['*'], 'page', $page);

        return Inertia::render('City/Search')->with([
            'searchQuery' => $searchQuery,
            'cities' => Inertia::merge($cities->items()),
            'isMore' => $cities->hasMorePages(),
        ]);
    }
}
