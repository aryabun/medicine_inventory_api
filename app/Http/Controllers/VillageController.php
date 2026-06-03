<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    //
    protected Village $village;
    public function __construct(Village $village)
    {
        $this->village = $village;
    }
    public function index(){
        $villages = $this->village->all();
        return response()->json($villages);
    }
}
