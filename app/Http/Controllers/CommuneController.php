<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    //
    protected Commune $commune;
    public function __construct(Commune $commune)
    {
        $this->commune = $commune;
    }
    public function index(){
        $communes = $this->commune->all();
        return response()->json($communes, 200);
    }
}
