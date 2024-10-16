<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Supports\Helper;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    use Helper;

    public function __construct()
    {
//        $this->middleware(function ($request, $next) {
//            if (!$this->can(request()->route()->action['as'])) {
//                return $this->returnData(5000, null, 'You are not authorized to access this page');
//            }
//            return $next($request);
//        });
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
            })->get();

        return $this->returnData(2000, $data);
    }

    public function create()
    {
// Code for showing the form to create a new application
    }

    public function store(Request $request)
    {
        if (!$this->can('application.store')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }

        $validator = $this->model->Validator($request->all());

        if ($validator->fails()) {
            return $this->returnData(3000, $validator->errors());
        }

        $this->model->fill($request->all());
        $this->model->save();

        return $this->returnData(2000, $this->model);
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

        $application->application_status = $request->application_status;
        $application->interview_status = $request->interview_status;
        $application->note = $request->note;
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
