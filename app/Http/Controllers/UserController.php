<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
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

        $this->model=new User();
    }

    public function index()
    {
//        $users = User::with('company')->get()->map(function($user) {
//            $user->roles = Role::whereIn('id', explode(',', $user->role_id))->get();
//            return $user;
//        });
        $users = User::with(['company', 'roles'])->get();
        return $this->returnData(2000,$users);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $validator = $this->model->Validator($request->all());

        if ($validator->fails()) {
            return $this->returnData(3000,$validator->errors());
        }
        $this->model->fill($request->all());
        $this->model->password = Hash::make($request->password);
        $this->model->save();
        return $this->returnData(2000, $this->model);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'role_id' => 'required',

        ]);

        $id = $request->input('id');
        $data = User::find($id);

        if ($data){

            $data->role_id = $request->input('role_id');


            $data->save();

            return $this->returnData(2000, ' updated Successfully ');


        }

        return $this->returnData(3000, ' not found');

    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
    }
    public function assignRoles(Request $request, $userId)
    {

        $user = User::findOrFail($userId);


        $user->roles()->sync($request->role_ids);

        return $this->returnData(2000,'successfull');
    }
}
