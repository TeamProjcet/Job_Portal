<?php

namespace App\Http\Controllers;

use App\Models\SavedJobs;
use Illuminate\Http\Request;

class SavedJobsController extends Controller
{
    /**
     * Display a listing of the saved jobs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $savedJobs = SavedJobs::with('job', 'jobSeeker')->get();
        return response()->json($savedJobs);
    }

    /**
     * Store a newly saved job in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'seeker_id' => 'required|exists:job_seekers,seeker_id',
            'job_id' => 'required|exists:jobs,job_id',
        ]);

        $savedJob = SavedJobs::create([
            'seeker_id' => $request->seeker_id,
            'job_id' => $request->job_id,
        ]);

        return response()->json($savedJob, 201);
    }

    /**
     * Remove the specified saved job from storage.
     *
     * @param int $savedJobId
     * @return \Illuminate\Http\Response
     */
    public function destroy($savedJobId)
    {
        $savedJob = SavedJobs::findOrFail($savedJobId);
        $savedJob->delete();

        return response()->json(null, 204);
    }
}
