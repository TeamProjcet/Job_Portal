<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Supports\Helper;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use Helper;
    public function __construct()
    {
//        $this->middleware(function ($request, $next) {
//            if (!$this->can(request()->route()->action['as'])){
//                return $this->returnData(5000, null, 'You are not authorized to access this page');
//            }
//            return $next($request);
//        });
        $this->model= new Slider();
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
            return $this->returnData(3000,$validator->errors());
        }
        $this->model->fill($request->all());
        $this->model->save();
        return $this->returnData(2000, $this->model);

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {

        try {
            $validator = $this->model->Validator($request->all());

            if ($validator->fails()) {
                return response()->json(['result' => $validator->errors(), 'status' => 3000], 200);
            }
            $data = $this->model->where('id', $request->input('id'))->first();
            if ($data) {
                $data->fill($request->all());
                $data->update();

                return $this->returnData(2000, $data);
            }
            return $this->returnData(3000, null, 'Category not found');

        } catch (\Exception $e) {
            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
        }
    }

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
