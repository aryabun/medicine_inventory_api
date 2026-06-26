<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    protected Permission $permission;
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;

    }
    public function index()
    {
        $permissions = $this->permission
            ->get();

        return response()->json($permissions);
    }
}
