<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityTownshipController extends Controller
{
    public function index()
    {
        $cities = DB::table('cities')->get();

        $cityTownships = DB::table('cities')
            ->join('townships', 'cities.id', '=', 'townships.city_id')
            ->select(
                'cities.id as city_id',
                'cities.name as city_name',
                'townships.township_name as township_name', // <-- fixed column name
                'townships.id as township_id'
            )
            ->get();

        return view('cities.index', compact('cities', 'cityTownships'));
    }
}
