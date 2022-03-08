<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Gym;
use App\Models\Revenue;
use Illuminate\Http\Request;

class CityController extends Controller
{
    #=======================================================================================#
    #			                          list Function                                   	#
    #=======================================================================================#
    public function list()
    {
        $allCities = City::all();
        if (count($allCities) <= 0) { //for empty statement
            return view('empty');
        }
        return view("city.list", ['allCities' => $allCities]);
    }

    #=======================================================================================#
    #			                          show Function                                   	#
    #=======================================================================================#
    public function show($cityID)
    {
        $totalRevenue = 0;
        $citiesManagers = "";
        $gymsManagers = 0;
        $coaches = 0;
        $users = 0;

        $userOfCity = City::find($cityID)->users;

        foreach ($userOfCity as $usersID) {
            $totalRevenue += (Revenue::where('user_id', '=', $usersID['id'])->sum('price')) / 100;
        }
        $revenueInDollars = number_format($totalRevenue, 2, ',', '.');

        $gyms = count(Gym::where('city_id', '=', $cityID)->get());

        //get users by type in cityManager city
        foreach ($userOfCity as $singleUser) {
            if ($singleUser->hasRole('cityManager')) {
                $citiesManagers = $singleUser;
            } elseif ($singleUser->hasRole('gymManager')) {
                $gymsManagers++;
            } elseif ($singleUser->hasRole('coach')) {
                $coaches++;
            } elseif ($singleUser->hasRole('user')) {
                $users++;
            }
        }
        return view("city.show", [
            'citiesManagers' => $citiesManagers,
            'gyms' => $gyms,
            'gymsManagers' => $gymsManagers,
            'coaches' => $coaches,
            'users' => $users,
            'revenueInDollars' => $revenueInDollars,
        ]);
    }
}