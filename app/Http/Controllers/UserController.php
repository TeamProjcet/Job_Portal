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
    public function index()
    {
        $users = User::all()->map(function($user) {
            $user->roles = Role::whereIn('id', explode(',', $user->role_id))->get();
            return $user;
        });
        return $this->returnData(2000,$users);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

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
