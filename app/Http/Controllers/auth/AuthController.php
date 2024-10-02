<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
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
    public function viewReg()
    {

        return view('auth.register');
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
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|string|max:50|unique:users,email',
            'password'=>'required|string|max:20|min:4',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return redirect('/login')->with('status','User create Successfully');
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
