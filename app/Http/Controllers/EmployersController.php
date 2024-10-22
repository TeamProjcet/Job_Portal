<?php

namespace App\Http\Controllers;

use App\Models\Employers;
use App\Models\User;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployersController extends Controller
{
    use Helper;
    public function __construct()
    {
        $this->model = new Employers();
    }
    public function index()
    {
        if (!$this->can('employer.index')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }
        $user = Auth::id();
        $data = User::where('id', '!=', $user)->with('company', 'employer')->get();
        return $this->returnData(2000, $data);
    }

    public function create()
    {
        // Code for showing create form
    }


    public function store(Request $request)
    {

        $validator = $this->model->Validator($request->all());
        if ($validator->fails()) {
            return response()->json(['result' => $validator->errors(), 'status' => 3000], 422);
        }

        if ($this->model::where('user_id', Auth::id())->exists()) {
            return response()->json(['message' => 'An employer profile already exists for this user.', 'status' => 3001], 409);
        }

        $this->model->fill($request->all());
        $this->model->user_id = Auth::id();

        if ($this->model->save()) {
            return $this->returnData(2000, $this->model);
        } else {
            return response()->json(['message' => 'Failed to create employer profile.', 'status' => 500], 500);
        }
    }


    public function show()
    {
        $user = Auth::user();
        return $this->returnData(2000,$user);
    }

    public function edit(Employers $employers)
    {
        // Code for showing edit form
    }

    public function update(Request $request)
    {

        try {
            $validator = $this->model->Validator($request->all());

            if ($validator->fails()) {
                return response()->json(['result' => $validator->errors(), 'status' => 3000], 200);
            }

            $employer = $this->model->where('id', $request->input('id'))->first();

            if ($employer) {
                $employer->fill($request->all());
                $employer->save();

                return $this->returnData(2000, $employer);
            }

            return $this->returnData(3000, null, 'Employer not found');

        } catch (\Exception $e) {
            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
        }
    }


    public function destroy( $id)
    {
        if (!$this->can('employer.destroy')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }

        try {
            $data = User::where('id',$id)->first();
            if ($data){
                $data->delete();

                return $this->returnData(2000, null, 'employer deleted successfully');
            }
            return $this->returnData(3000, null, 'employer not found');

        }catch (\Exception $exception){
            return $this->returnData(5000, $exception->getMessage(), 'Something Wrong');
        }
    }

}
