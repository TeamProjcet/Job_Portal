<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\BlogComment;
use App\Supports\Helper;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->model = new BlogComment();
    }

    public function backendData()
    {
//        if (!$this->can(' application.index')) {
//            return $this->returnData(5000, null, 'You are not authorized to access this page');
//        }
        $user = auth()->user();

        $data['applyData'] = Applications::with(['job.category', 'job.company', 'seeker'])
            ->whereHas('job', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->paginate(10);

        // $data['category'] = Category::get();
        // $data['company'] = Company::get();

        return $this->returnData(2000, $data);
    }




    public function blogcomment()
    {
        $user = auth()->user();
        $data = BlogComment::with('seeker', 'blog')
            ->whereHas('blog', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();

        return $this->returnData(2000, $data);
    }


    public function blogCommentDelete($id)
    {
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
