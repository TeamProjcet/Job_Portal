<?php

namespace App\Http\Controllers;

use App\Models\PartnershipModel;
use App\Supports\Helper;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->model = new PartnershipModel();
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

    }


    public function edit($id)
    {

    }


    public function update(Request $request)
    {


        try {
            $validator = $this->model->Validator($request->all());

            if ($validator->fails()) {
                return response()->json(['result' => $validator->errors(), 'status' => 3000], 200);
            }
            $partnership = $this->model->where('id', $request->input('id'))->first();
            if ($partnership) {
                $partnership->fill($request->all());
                $partnership->update();

                return $this->returnData(2000, $partnership);
            }
            return $this->returnData(3000, null, 'Partnership not found');

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

                return $this->returnData(2000, null, 'Partnership deleted successfully');
            }
            return $this->returnData(3000, null, 'Partnership not found');

        }catch (\Exception $exception){
            return $this->returnData(5000, $exception->getMessage(), 'Something Wrong');
        }
    }
}
