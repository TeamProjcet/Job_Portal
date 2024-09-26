<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobPostModel;
use App\Supports\Helper;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->model = new JobPostModel();
    }

    public function index()
    {
        $data = $this->model->get();
        return $this->returnData(2000, $data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = $this->model->Validator($request->all());

        if ($validator->fails()) {
            return response()->json(['result' => $validator->errors(), 'status' => 3000], 200);
        }

        $this->model->fill($request->all());
        $this->model->save();
        return $this->returnData(2000, $this->model);

    }


    public function show( )
    {

    }


    public function edit($id)
    {
        $data=$this->model->where('id',$id)->first();
        return $this->returnData(2000, $data);

    }


    public function update(Request $request)
    {
//        if (!$this->can('category_edit')){
//            return $this->returnData(5000, null, 'You do not have permission to edit this category');
//        }


        try {
            $validator = $this->model->Validator($request->all());

            if ($validator->fails()) {
                return response()->json(['result' => $validator->errors(), 'status' => 3000], 200);
            }


            $category = $this->model->where('id', $request->input('id'))->first();

            if ($category) {
                $category->fill($request->all());
                $category->status = $request->input('status') == 1 ? 1 : 0;
                $category->update();

                return $this->returnData(2000, $category);
            }
            return $this->returnData(3000, null, 'Category not found');

        } catch (\Exception $e) {
            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
        }
    }

//    public function update(Request $request)
//    {
//        // Uncomment this line if you need permission checks
//        // if (!$this->can('category_edit')) {
//        //     return $this->returnData(5000, null, 'You do not have permission to edit this category');
//        // }
//
//        try {
//            // Validate the incoming request data
//            $validator = $this->model->Validator($request->all());
//
//            if ($validator->fails()) {
//                return response()->json(['result' => $validator->errors(), 'status' => 3000], 200);
//            }
//
//            // Find the category by ID
//            $category = $this->model->where('id', $request->input('id'))->first();
//
//            if ($category) {
//                // Fill the category with the new data from the request
//                $category->fill($request->all());
//
//                // Determine the status (1 for active, 0 for inactive)
//                $category->status = $request->input('status') == 1 ? 1 : 0;
//
//                // Save the updated category
//                $category->save();
//
//                return $this->returnData(2000, $category);
//            }
//
//            return $this->returnData(3000, null, 'Category not found');
//
//        } catch (\Exception $e) {
//            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
//        }
//    }


    public function destroy($id)
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
