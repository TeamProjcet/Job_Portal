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
        $this->model=new Applications();
    }
    public function index()
    {

    }

    public function create()
    {
        // Code for showing the form to create a new application
    }

    public function store(Request $request)
    {

        $validator = $this->model->Validator($request->all());

        if ($validator->fails()) {
            return response()->json(['result' => $validator->errors(), 'status' => 3000], 100);
        }
        dd($this->model->fill($request->all()));

        $this->model->save();
        return $this->returnData(2000, $this->model);


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