<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use App\Supports\Helper;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{

    use Helper;

    public function __construct()
    {
        $this->model = new BlogComment();
    }


    public function index()
    {
        $savedJobs = BlogComment::with('seeker', 'blog')->get();
//        dd($savedJobs);
        return $this->returnData(2000,  $savedJobs);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = $this->model->Validator($request->all());
        if ($validator->fails()) {
            return $this->returnData(3000, $validator->errors());
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


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
        try {
            $data = $this->model->where('id',$id)->first();
            if ($data){
                $data->delete();

                return $this->returnData(2000, null, 'save job deleted successfully');
            }
            return $this->returnData(3000, null, 'save job not found');

        }catch (\Exception $exception){
            return $this->returnData(5000, $exception->getMessage(), 'Something Wrong');
        }
    }
}
