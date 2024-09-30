<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function index()
    {
        // Code for displaying a listing of applications
    }

    public function create()
    {
        // Code for showing the form to create a new application
    }

    public function store(Request $request)
    {
        // Code for storing a newly created application
    }

    public function show(Applications $applications)
    {
        // Code for displaying a specific application
    }

    public function edit(Applications $applications)
    {
        // Code for showing the form to edit a specific application
    }

    public function update(Request $request, Applications $applications)
    {
        // Code for updating a specific application
    }

    public function destroy(Applications $applications)
    {
        // Code for deleting a specific application
    }
}
