<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleModule;
use App\Supports\Helper;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use Helper;
public function __construct(){
    $this->model=new Role();
}
    public function index()
    {
        $role=Role::all();
        return $this->returnData(2000,$role);
    }

    public function getRolePermissions($roleId)
    {
        try {

            $role = Role::with('permissions')->findOrFail($roleId);

            $permissions = $role->permissions;

            return $this->returnData(2000,$permissions);
        } catch (\Exception $e) {
            return $this->returnData(3000);
        }
    }
    public function updateRolePermissions(Request $request, $roleId)
    {
        $role = Role::find($roleId);
        $role->permissions()->sync($request->permissions);
        return response()->json(['message' => 'Permissions updated successfully']);
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = $this->model->Validator($request->all());

        if ($validator->fails()) {
            return $this->returnData(3000,$validator->errors());
        }
        $this->model->fill($request->all());
        $this->model->save();
        return $this->returnData(2000, $this->model);

    }


    public function show($id)
    {    $roleModules = RoleModule::where('role_id', $id)->get();
        $data['role_modules'] = collect($roleModules)->pluck('id')->toArray();
        $data['role_permissions'] = collect($roleModules)->pluck('permission_id')->toArray(); // Assuming permission_id is the correct column

        return $this->returnData(2000,$data);
    }





    public function edit(Role $role)
    {
        //
    }

    public function update(Request $request)
    {
        try {
            $validator = $this->model->Validator($request->all());

            if ($validator->fails()) {
                return $this->returnData(3000,$validator->errors());

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
            $data = $this->model->where('id',$id)->first();
            if ($data){
                $data->delete();

                return $this->returnData(2000, null, ' deleted successfully');
            }
            return $this->returnData(3000, null, ' not found');

        }catch (\Exception $exception){
            return $this->returnData(5000, $exception->getMessage(), 'Something Wrong');
        }
    }
}
