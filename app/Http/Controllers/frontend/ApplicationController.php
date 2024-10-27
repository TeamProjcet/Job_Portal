<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\JobPostModel;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->model = new Applications();
    }

    public function index()
    {
        if (!$this->can('application.index')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }

        $user = auth()->user();
        $data = Applications::with(['job.category', 'job.company', 'seeker'])
            ->whereHas('job', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->paginate(12);

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
            return $this->returnData(3000, $validator->errors());
        }
        $seekerId = Auth::guard('seeker')->user()->id;
        $existingJob = $this->model::where('job_id', $request->job_id)
            ->where('seeker_id', $seekerId)
            ->first();

        if ($existingJob) {
            return $this->returnData(4000, null, 'You have already applied for this job');
        }

        $application = new $this->model;
        $application->fill($request->all());
        $application->seeker_id = $seekerId;
        $application->save();

        return $this->returnData(2000, $application);
    }

    public function show($id)
    {
        if (!$this->can('application.show')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }

        $post = $this->model->with('job', 'seeker')->findOrFail($id);
        return $this->returnData(2000, $post);
    }

    public function edit(Applications $applications)
    {
        if (!$this->can('application.edit')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }
// Code for showing the form to edit a specific application
    }


    public function update(Request $request, $id)
    {
        if (!$this->can('application.update')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }

        $application = Applications::find($id);
        if (!$application) {
            return response()->json(['message' => 'Application not found'], 404);
        }

        $previousInterviewStatus = $application->interview_status;

        $application->application_status = $request->application_status;
        $application->interview_status = $request->interview_status;
        $application->note = $request->note;

        $job = JobPostModel::findOrFail($application->job_id);

        if ($previousInterviewStatus == 2 && $application->interview_status != 2) {
            $job->vacancy++;
        } elseif ($previousInterviewStatus != 2 && $application->interview_status == 2) {
            if ($job->vacancy > 0) {
                $job->vacancy--;
            }
        }

        $job->save();
        $application->save();

        return $this->returnData(2000, $application);
    }

    public function destroy($id)
    {
        if (!$this->can('application.destroy')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }

        try {
            $data = $this->model->where('id', $id)->first();
            if ($data) {
                $data->delete();
                return $this->returnData(2000, null, 'Application deleted successfully');
            }
            return $this->returnData(3000, null, 'Application not found');

        } catch (\Exception $exception) {
            return $this->returnData(5000, $exception->getMessage(), 'Something went wrong');
        }
    }
}
