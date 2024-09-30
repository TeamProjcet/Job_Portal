<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Seeker;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SeekerLoginController extends Controller
{
    use Helper;


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:seekers',
            'password' => 'required|string|min:4|',
        ]);

        $data = new Seeker();
        $data->fill($request->all());
        $data->password = Hash::make($request->password);
        $data->save();

        return response()->json([
            'status' => 2000,
            'data' => $data,
            'message' => 'Seeker registered successfully'
        ], 201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:4',
        ]);

        $seeker = Seeker::where('email', $request->email)->first();

        if ($seeker && Hash::check($request->password, $seeker->password)) {
            return response()->json([
                'status' => 2000,
                'data' => $seeker,
                'message' => 'Login successful'
            ], 200);
        }

        return response()->json([
            'status' => 4000,
            'message' => 'Invalid credentials'
        ], 401);
    }

}
