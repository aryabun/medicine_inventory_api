<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index(){
        $user = $this->user->all();
        return response()->json(["data"=>$user]);
    }
}
