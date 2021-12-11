<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Department;


class EmployeeDataController extends Controller
{
    public function countries()
    {
        $countries = Country::all();
        return response()->json($countries);
    }


    public function states(Country $country)
    {
        return response()->json($country->states);
    }

    public function cities(State $state)
    {
        return response()->json($state->cities);
    }

    public function departments()
    {
        $departments = Department::all();
        return response()->json($departments);
    }

}