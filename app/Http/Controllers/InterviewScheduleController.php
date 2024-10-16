<?php

namespace App\Http\Controllers;

use App\Models\InterviewSchedule;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterviewScheduleController extends Controller
{
    use Helper;
    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            if (!$this->can(request()->route()->action['as'])){
                return $this->returnData(5000, null, 'You are not authorized to access this page');
            }
            return $next($request);
        });

        $this->model=new InterviewSchedule();
    }

    public function index()
    {
        $user = auth()->user();
        $data = $this->model->with('job','user')
            ->where('user_id', $user->id)
            ->get();
        return $this->returnData(2000, $data);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {

        $validator = $this->model->Validator($request->all());

        if ($validator->fails()) {
            return $this->returnData(3000, $validator->errors());
        }

        $this->model->fill($request->all());
        $this->model->user_id = Auth::id();
        $this->model->save();

        return $this->returnData(2000,$this->model);
    }

    public function show(InterviewSchedule $interviewSchedule)
    {
    }

    public function edit(InterviewSchedule $interviewSchedule)
    {
    }

    public function update(Request $request, InterviewSchedule $interviewSchedule)
    {
    }

    public function destroy(InterviewSchedule $interviewSchedule)
    {
    }
}
