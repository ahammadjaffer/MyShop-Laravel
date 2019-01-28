<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Collection;
// use DB;

class dbController extends Controller
{
    public function showCountry()
    {
        $countries=DB::table('countries')->get();

        return view('/dropdown',['Countries'=>$countries]);
    }

    public function showState(Request $request)
    {
        $states=DB::table('states')->where('country_id',$request->country_id)->pluck('state_name','state_id');

        return response()->json($states);
    }

    public function showCities(Request $request)
    {
        $city=DB::table('cities')->where('state_id',$request->state_id)->pluck('city_name','city_id');

        return response()->json($city);
    }
}
