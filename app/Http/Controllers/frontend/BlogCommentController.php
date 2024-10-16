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
        //
    }


    public function destroy($id)
    {
        try {
            $data = BlogComment::find($id);
            if ($data) {
                $data->delete();
                return response()->json(['message' => 'Blog Comment deleted successfully.'], 200);
            } else {
                return response()->json(['message' => 'Blog Comment not found.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong, please try again later.'], 500);
        }
    }
}
