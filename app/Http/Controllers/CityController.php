<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //
    protected City $city;
    public function __construct(City $city)
    {
        $this->city = $city;
    }
    public function index(){
        $cities = $this->city->all();
        return response()->json($cities);
    }
}
