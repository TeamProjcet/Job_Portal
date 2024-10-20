<?php

namespace App\Http\Controllers;

use App\Models\SavedJobs;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedJobsController extends Controller
{
    use Helper;
    public function __construct()
    {
        $this->model=new SavedJobs();
    }


    public function index()
    {
        $seekerId = Auth::guard('seeker')->user();
        $savedJobs = SavedJobs::with('seeker', 'job')->where('seeker_id',$seekerId->id)->get();
        return $this->returnData(2000,  $savedJobs);

    }

    public function create()
    {

    }


    public function store(Request $request)
    {
        $validator = $this->model->Validator($request->all());
        if ($validator->fails()) {
            return $this->returnData(2000, $validator->errors());
        }
        $seekerId = Auth::guard('seeker')->user()->id;
        $existingJob = $this->model::where('job_id', $request->job_id)
            ->where('seeker_id', $seekerId)
            ->first();
        if ($existingJob) {
            return $this->returnData(409, ['message' => 'Job already saved.']);
        }
        $this->model->fill($request->all());
        $this->model->seeker_id = $seekerId;
        $this->model->save();

        return $this->returnData(2000, $this->model);
    }
    public function show(SavedJobs $savedJobs)
    {
    }

    public function edit(SavedJobs $savedJobs)
    {
    }

    public function update(Request $request, SavedJobs $savedJobs)
    {
        // Code for updating a specific saved job
    }

    public function destroy($id)
    {
        try {
            $data = $this->model->where('id',$id)->first();
            if ($data){
                $data->delete();

                return $this->returnData(2000, null, 'save job deleted successfully');
            }
            return $this->returnData(3000, null, 'save job not found');

        }catch (\Exception $exception){
            return $this->returnData(5000, $exception->getMessage(), 'Something Wrong');
        }
    }
}
