<?php
namespace App\Http\Controllers;

use App\Models\Role;

class RoleController extends Controller
{
    protected Role $role;
    public function __construct(Role $role)
    {
        $this->role = $role;

    }
    public function index()
    {
        $roles = $this->role->with('permissions')
            ->orderBy('name')
            ->get();

        return response()->json($roles);
    }
}
