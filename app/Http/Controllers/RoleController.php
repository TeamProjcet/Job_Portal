<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleModule;
use App\Models\RolePermission;
use App\Supports\Helper;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use Helper;

    public function __construct()
    {

//    $this->middleware(function ($request, $next) {
//        if (!$this->can(request()->route()->action['as'])){
//            return $this->returnData(5000, null, 'You are not authorized to access this page');
//        }
//        return $next($request);
//    });
        $this->model = new Role();
    }

    public function index()
    {
        if (!$this->can('roles.index')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }
        $role = Role::all();
        return $this->returnData(2000, $role);
    }

    public function getRolePermissions($roleId)
    {
        try {
            if (!$this->can('roles.getRolePermissions')) {
                return $this->returnData(5000, null, 'You are not authorized to access this page');
            }

            $data['role_modules'] = RoleModule::where('role_id', $roleId)->pluck('module_id')->toArray();
            $data['role_permissions'] = RolePermission::where('role_id', $roleId)->pluck('permission_id')->toArray();

            return $this->returnData(2000, $data);

        } catch (\Exception $e) {
            return $this->returnData(3000, null, 'An error occurred while fetching role permissions');
        }
    }

    public function updateRolePermissions(Request $request, $roleId)
    {
        try {
            if (!$this->can('roles.updateRolePermissions')) {
                return $this->returnData(5000, null, 'You are not authorized to access this page');
            }

            $request->validate([
                'permissions' => 'required|array',
                'permissions.*' => 'exists:permissions,id',
                'modules' => 'required|array',
                'modules.*' => 'exists:modules,id',
            ]);

            $role = Role::find($roleId);
            if (!$role) {
                return response()->json(['message' => 'Role not found'], 404);
            }

            $role->permissions()->sync($request->permissions);
            $role->modules()->sync($request->modules);

            return $this->returnData(2000, 'Permissions updated successfully');

        } catch (\Exception $e) {
            return $this->returnData(3000, null, 'An error occurred while updating permissions');
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if (!$this->can('roles.store')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');

    }
        $validator = $this->model->Validator($request->all());

        if ($validator->fails()) {
            return $this->returnData(3000, $validator->errors());
        }
        $this->model->fill($request->all());
        $this->model->save();
        return $this->returnData(2000, $this->model);

    }


    public function show($id)
    {
        if (!$this->can('roles.show')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }

        $roleModules = RoleModule::where('role_id', $id)->get();
        $data['role_modules'] = collect($roleModules)->pluck('module_id')->toArray();
        $data['role_permissions'] = collect($roleModules)->pluck('permission_id')->toArray();

        return $this->returnData(2000, $data);
    }





    public function edit(Role $role)
    {
        //
    }

    public function update(Request $request)
    {
        try {
            if (!$this->can('roles.update')) {
                return $this->returnData(5000, null, 'You are not authorized to access this page');

        }
            $validator = $this->model->Validator($request->all());

            if ($validator->fails()) {
                return $this->returnData(3000, $validator->errors());

            }
            $data = $this->model->where('id', $request->input('id'))->first();
            if ($data) {
                $data->fill($request->all());
                $data->update();

                return $this->returnData(2000, $data);
            }
            return $this->returnData(3000, null, ' not found');

        } catch (\Exception $e) {
            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
        }
    }

    public function destroy($id)
    {
        try {
            if (!$this->can('roles.destroy')) {
                return $this->returnData(5000, null, 'You are not authorized to access this page');

        }
            $data = $this->model->where('id', $id)->first();
            if ($data) {
                $data->delete();

                return $this->returnData(2000, null, ' deleted successfully');
            }
            return $this->returnData(3000, null, ' not found');

        } catch (\Exception $exception) {
            return $this->returnData(5000, $exception->getMessage(), 'Something Wrong');
        }
    }
}
