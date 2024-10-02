<?php

namespace App\Http\Controllers;

use App\Models\Employers;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployersController extends Controller
{
    use Helper;
    public function __construct()
    {
        $this->model = new Employers();
    }
    public function index()
    {
        $data = $this->model->get();
        return $this->returnData(2000, $data);
    }

    public function create()
    {
        // Code for showing create form
    }

    public function store(Request $request)
    {
        $validator = $this->model->Validator($request->all());

        if ($validator->fails()) {
            return response()->json(['result' => $validator->errors(), 'status' => 3000], 100);
        }
        $this->model->create([
            'user_id' => Auth::id(),
            'company_name' => $request->input('company_name'),
            'company_website' => $request->input('company_website'),
            'company_address' => $request->input('company_address'),
            'contact_person' => $request->input('contact_person'),
            'industry' => $request->input('industry'),
            'company_description' => $request->input('company_description'),
        ]);

        return $this->returnData(2000, $this->model);
    }

    public function show()
    {
        // Get the authenticated user's profile
        $user = Auth::user();

        // Return user data as JSON
        return response()->json($user);
    }

    public function edit(Employers $employers)
    {
        // Code for showing edit form
    }

    public function update(Request $request, Employers $employers)
    {
        try {
            $validator = $this->model->Validator($request->all());

            if ($validator->fails()) {
                return response()->json(['result' => $validator->errors(), 'status' => 3000], 200);
            }
            $category = $this->model->where('id', $request->input('id'))->first();
            if ($category) {
                $category->fill($request->all());
                $category->update();

                return $this->returnData(2000, $category);
            }
            return $this->returnData(3000, null, 'Category not found');

        } catch (\Exception $e) {
            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
        }
    }

    public function destroy( $id)
    {

        try {
            $data = $this->model->where('id',$id)->first();
            if ($data){
                $data->delete();

                return $this->returnData(2000, null, 'Category deleted successfully');
            }
            return $this->returnData(3000, null, 'Category not found');

        }catch (\Exception $exception){
            return $this->returnData(5000, $exception->getMessage(), 'Something Wrong');
        }
    }

}
