<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
use Helper;
    public function __construct()
    {
        $this->model = new User();
    }

    public function index()
    {
        return view('auth.login');

    }

    public function userdata(){
        $data= Auth::user();
        return $this->returnData(2000, $data);
    }

    public function adlogin(Request $request){
        $credentials=[
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ];
        $login=Auth::attempt($credentials);

        if ($login){
            return redirect('/admin/dashboard');
        }else{
            Session::flash('failed','Login Failed');
            return redirect()->back();
        }
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
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
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

    }

    public function destroy($id)
    {

    }


}
