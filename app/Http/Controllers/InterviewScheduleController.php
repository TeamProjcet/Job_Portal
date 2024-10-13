<?php

namespace App\Http\Controllers;

use App\Models\InterviewSchedule;
use Illuminate\Http\Request;

class InterviewScheduleController extends Controller
{
    public function index()
    {
        $interviews = InterviewSchedule::with('job', 'jobSeeker', 'employer')->get();
        return response()->json($interviews);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
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
