<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\Category;
use App\Models\Company;
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
        })->with('category','company')->paginate(2);

        $data['category'] = Category::get();

        $data['company'] = Company::get();


        return $this->returnData(2000,$data);
    }


    public function jobCategory($cateId)
    {
        $data['jobPosts'] = JobPostModel::with('category','company')->where('category_id',$cateId)->get();
        return $this->returnData(2000,$data);

        return $this->returnData(2000,$data);

    }




   public function seekerdata()
    {
       $user = Auth::guard('seeker')->user();

       if (!$user) {
           return response()->json(['error' => 'Unauthorized'], 401);
       }

       $applications = Applications::with('seeker', 'job')->where('seeker_id',  $user->id)->get();

       $data = [
           'seeker' => $user,
           'applications' => $applications,
       ];

        return $this->returnData(2000,$data);

    }



}
