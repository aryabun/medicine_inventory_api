<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    //
    protected District $district;
    public function __construct(District $district)
    {
        $this->district = $district;
    }
    public function index(){
        $districts = $this->district->all();
        return response()->json($districts);
    }
}
