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
        // Code for showing the form to create a new interview schedule
    }

    public function store(Request $request)
    {
        // Code for storing a newly created interview schedule
    }

    public function show(InterviewSchedule $interviewSchedule)
    {
        // Code for displaying a specific interview schedule
    }

    public function edit(InterviewSchedule $interviewSchedule)
    {
        // Code for showing the form to edit a specific interview schedule
    }

    public function update(Request $request, InterviewSchedule $interviewSchedule)
    {
        // Code for updating a specific interview schedule
    }

    public function destroy(InterviewSchedule $interviewSchedule)
    {
        // Code for deleting a specific interview schedule
    }
}
