<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Supports\Helper;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
use Helper;
    public function index()
    {

        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();

        return $this->returnData([
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(RolePermission $rolePermission)
    {
        //
    }
    public function edit(RolePermission $rolePermission)
    {
        //
    }


    public function update(Request $request, RolePermission $rolePermission)
    {
        $role = Role::findOrFail($rolePermission);
        $role->permissions()->sync($request->permissions);

        return $this->returnData(2000);

    }

    public function destroy(RolePermission $rolePermission)
    {
        //
    }
}
