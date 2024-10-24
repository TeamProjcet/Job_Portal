<?php

namespace App\Http\Controllers;

use App\Models\CompanyReviews;
use Illuminate\Http\Request;

class CompanyReviewsController extends Controller
{
    public function index()
    {
        // Code for displaying a listing of company reviews
    }

    public function create()
    {
        // Code for showing the form to create a new company review
    }

    public function store(Request $request)
    {
        // Code for storing a newly created company review
    }

    public function show(CompanyReviews $companyReviews)
    {
        // Code for displaying a specific company review
    }

    public function edit(CompanyReviews $companyReviews)
    {
        // Code for showing the form to edit a specific company review
    }

    public function update(Request $request, CompanyReviews $companyReviews)
    {
        // Code for updating a specific company review
    }

    public function destroy(CompanyReviews $companyReviews)
    {
        // Code for deleting a specific company review
    }
}
