<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\blog;
use App\Supports\Helper;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    use Helper;
    public function __construct()
    {
        $this->model=new Applications();
    }
    public function index()
    {
        $data = $this->model->with('job', 'seeker')->get();
        return $this->returnData(2000, $data);
    }


    public function create()
    {
        // Code for showing the form to create a new application
    }

    public function store(Request $request)
    {
        $validator = $this->model->Validator($request->all());

        if ($validator->fails()) {
            return response()->json(['result' => $validator->errors(), 'status' => 3000], 422); // Use proper status code for validation errors
        }

        $this->model->fill($request->all());
        $this->model->save();

        return response()->json(['message' => 'Application submitted successfully', 'status' => 2000], 200);
    }

    public function show($id)
    {
        $post = Applications::with('job', 'seeker')->findOrFail($id);
        return response()->json(['result' => $post]);
    }

    public function edit(Applications $applications)
    {
        // Code for showing the form to edit a specific application
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $application = Applications::find($id);
        if (!$application) {
            return response()->json(['message' => 'Application not found'], 404);
        }

        $application->application_status = $request->status;
        $application->save();

        return response()->json([
            'message' => 'Application status updated successfully',
            'application' => $application
        ]);
    }


    public function destroy($id)
    {
        try {
            $data = $this->model->where('id',$id)->first();
            if ($data){
                $data->delete();

                return $this->returnData(2000, null, 'Category deleted successfully');
            }
            return $this->returnData(3000, null, 'Category not found');

        }catch (\Exception $exception){
            return $this->returnData(5000, $exception->getMessage(), 'Something Wrong');
        }
    }
}