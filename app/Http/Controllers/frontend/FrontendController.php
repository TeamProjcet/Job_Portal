<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JobPostModel;
use App\Supports\Helper;
use Illuminate\Http\Request;
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

        $data['category'] = Category::all();

        return $this->returnData(2000,$data);
    }

    public function jobview($jobId){

        $data = JobPostModel::where('id',$jobId)->get();

        return $this->returnData(2000,$data);
    }
}
