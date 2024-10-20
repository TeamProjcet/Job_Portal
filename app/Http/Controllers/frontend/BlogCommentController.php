<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCommentController extends Controller
{

    use Helper;

    public function __construct()
    {
        $this->model = new BlogComment();
    }


    public function index()
    {
        if (!$this->can('blogcomment.index')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }
        $user = auth()->user();
        $data = BlogComment::with('seeker', 'blog')
            ->whereHas('blog', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();

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
            return $this->returnData(3000, $validator->errors());
        }
        $seeker = Auth::guard('seeker')->user()->id;
        $this->model->fill($request->all());
        $this->model->seeker_id = $seeker;
        $this->model->save();
        return $this->returnData(2000, $this->model);
    }


    public function show($id)
    {
        if (!$this->can('blogcomment.show')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }
       $data= $this->model->with('seeker')->where('blog_id', $id)->get();
        return $this->returnData(2000,$data);

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
        if (!$this->can('blogcomment.destroy')) {
            return $this->returnData(5000, null, 'You are not authorized to access this page');
        }
        try {
            $data = $this->model->where('id',$id)->first();
            if ($data){
                $data->delete();

                return $this->returnData(2000, null, 'Comment deleted successfully');
            }
            return $this->returnData(3000, null, 'Comment not found');

        }catch (\Exception $exception){
            return $this->returnData(5000, $exception->getMessage(), 'Something Wrong');
        }
    }
}
