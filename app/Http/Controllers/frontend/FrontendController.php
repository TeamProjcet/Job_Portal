<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\blog;
use App\Models\BlogComment;
use App\Models\Category;
use App\Models\Company;
use App\Models\JobPostModel;
use App\Models\PartnershipModel;
use App\Models\SavedJobs;
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
        $data['jobData'] = JobPostModel::with('category','company')->where('status',1)->orderBy('id','DESC')->paginate(1);
        $data['category'] = Category::get();
        $data['partner'] = PartnershipModel::take(4)->skip(0)->orderBy('id','DESC')->get();
        $data['partner_logo'] = PartnershipModel::orderBy('id','DESC')->get();
        $data['blogpost']=blog::with('user','company')->where('status',1)->orderBy('id','DESC')->paginate(2);
        $data['blogpost_slide'] = blog::with('user', 'company')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->take(6)
            ->skip(0)
            ->get();
        return $this->returnData(2000,$data);
    }

    public function jobCategory($cateId)
    {
        $data['jobPosts'] = JobPostModel::with('category','company')->where('category_id',$cateId)->get();
        $data['companycate'] = JobPostModel::with('category','company')->where('company_id',$cateId)->get();
        $data['blogComment'] = BlogComment::with('seeker')->where('blog_id',$cateId)->get();
        return $this->returnData(2000,$data);

    }

    public function detailsData($id)
    {
        $data['job'] = JobPostModel::findOrFail($id)->load('category', 'company');
        return $this->returnData(2000,$data);
    }

    public function blogDetails($id)
    {
        $data['post'] = blog::with('company')->findOrFail($id);
        return $this->returnData(2000,$data);
    }


   public function seekerdata()
    {
       $user = Auth::guard('seeker')->user();

        if (!$user) {
            return $this->returnData(5000, null, 'User is not logged in');
        }
       $applications = Applications::with( 'job')->where('seeker_id',  $user->id)->orderBy('id','DESC')->get();
        $data = [
           'seeker' => $user,
           'applications' => $applications,
       ];

        return $this->returnData(2000,$data);

    }




}
