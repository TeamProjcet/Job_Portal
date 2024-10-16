<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Permission;
use App\Supports\Helper;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    use Helper;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!$this->can(request()->route()->action['as'])){
                return $this->returnData(5000, null, 'You are not authorized to access this page');
            }
            return $next($request);
        });

        $this->model = new Permission();
    }

    public function index()
    {
        $permissions = Module::with('permissions')->get();

        return $this->returnData(2000,$permissions);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $validator = $this->model->Validator($request->all());

        if ($validator->fails()) {
            return $this->returnData(3000, $validator->errors());
        }
        $this->model->fill($request->all());
        $this->model->save();
        return $this->returnData(2000, $this->model);
    }

    public function show(Permission $permission)
    {

        return response()->json($permission);
    }

    public function edit(Permission $permission)
    {
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $permission->update([
            'name' => $request->name,
        ]);

        return response()->json(['status' => 'Permission updated successfully!', 'permission' => $permission]);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response()->json(['status' => 'Permission deleted successfully!']);
    }
}
