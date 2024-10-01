<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JobPostModel;
use App\Models\Seeker;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Nette\Utils\data;

class FrontendController extends Controller
{
    use Helper;
    public function joblist()
    {
        $job_type = \request()->input('job_type');

        $data['jobData'] = JobPostModel::where(function ($query) use ($job_type) {
            if ($job_type) {
                $query->where('job_type', $job_type);
            }
        })->with('category','company')->paginate(10);

        $data['category'] = Category::get();
//        $data['seeker'] = Auth::user();
//        $data['category']=JobPostModel::with('category:name,id')->get();

        return $this->returnData(2000,$data);
    }


    public function jobCategory($cateId)
    {
//        $category = Category::find($cateId);
//        $data['category']=JobPostModel::with('category:name,id')->get();
        $data['jobPosts'] = JobPostModel::with('category','company')->where('category_id',$cateId)->get();



        return response()->json(['result' => $data]);
    }

}
