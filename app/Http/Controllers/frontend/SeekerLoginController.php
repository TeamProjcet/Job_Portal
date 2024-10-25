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


    public function index(){
        $next_url = \request()->query('next_url');
        $user = Auth::guard('seeker')->user();
        if (!$user) {
            return $this->returnData(5000, null, 'User is not logged in');
        }
        $authName = Seeker::where('id', $user->id)->get();
        return $this->returnData(2000, $authName);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:seekers',
            'password' => 'required|string|min:4',
        ]);

        $data = new Seeker();
        $data->fill($request->all());
        $data->password = Hash::make($request->password);
        $data->save();


        return $this->returnData(2000, $data, 'Seeker registered successfully');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:4',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('seeker')->attempt($credentials)) {
            $seeker = Auth::guard('seeker')->user();
            $token = $seeker->createToken('Seeker Token')->plainTextToken;


            return response()->json([
                'status' => 2000,
                'data' => [
                    'seeker' => $seeker,
                    'token' => $token,
                ],
                'message' => 'Login successful',
            ], 200);
        } else {
            return response()->json([
                'status' => 4000,
                'message' => 'Unable to authenticate. Please verify your credentials',
            ], 401);
        }
    }

    public function logout()
    {
        Auth::guard('seeker')->logout();

        return $this->returnData(2000,null,'Logout successfull');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:seekers,email,' . Auth::guard('seeker')->id(),
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'image' => 'nullable|string',
            'skills' => 'nullable',
            'education' => 'nullable',
            'experience' => 'nullable',

        ]);

        $data = Auth::guard('seeker')->user();

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone', $data->phone);
        $data->image = $request->input('image', $data->image);
        $data->address = $request->input('address', $data->address);
        $data->bio = $request->input('bio', $data->bio);
        $data->skills = $request->input('skills', $data->skills);
        $data->education = $request->input('education', $data->education);
        $data->experience = $request->input('experience', $data->experience);

        $data->save();

        return $this->returnData(2000,$data,'Profile updated successfully');
    }
    public function superadmindata(){
        $user = Auth::user();
        if (!$user) {
            return $this->returnData(401, null, 'Unauthorized'); // 401 Unauthorized
        }
        if ((int)$user->role_id === 1) { // টাইপ কাস্টিং করুন
            return $this->returnData(2000, $user);
        } else {
            return $this->returnData(403, null, 'Unauthorized'); // 403 Forbidden
        }
    }
}