<?php

namespace App\Http\Controllers;

use App\Models\SavedJobs;
use Illuminate\Http\Request;

class SavedJobsController extends Controller
{
    public function index()
    {
        // Code for displaying a listing of saved jobs
    }

    public function create()
    {
        // Code for showing the form to create a new saved job
    }

    public function store(Request $request)
    {
        // Code for storing a newly created saved job
    }

    public function show(SavedJobs $savedJobs)
    {
        // Code for displaying a specific saved job
    }

    public function edit(SavedJobs $savedJobs)
    {
        // Code for showing the form to edit a specific saved job
    }

    public function update(Request $request, SavedJobs $savedJobs)
    {
        // Code for updating a specific saved job
    }

    public function destroy(SavedJobs $savedJobs)
    {
        // Code for deleting a specific saved job
    }
}
