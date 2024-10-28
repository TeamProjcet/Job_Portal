<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\blog;
use App\Models\BlogComment;
use App\Models\Category;
use App\Models\Company;
use App\Models\Frontendmanage;
use App\Models\JobPostModel;
use App\Models\Message;
use App\Models\PartnershipModel;
use App\Models\SavedJobs;
use App\Models\Seeker;
use App\Models\Slider;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Nette\Utils\data;

class FrontendController extends Controller
{
    use Helper;
    public function joblist()
    {
        $data['jobData'] = JobPostModel::with('category','company')->where('status',1)->orderBy('id','DESC')->paginate(15);
        $data['category'] = Category::get();
        $data['frontdata']=Frontendmanage::get();
        $data['slider']= Slider::get();
        $data['partner'] = PartnershipModel::take(4)->skip(0)->orderBy('id','DESC')->get();
        $data['partner_logo'] = PartnershipModel::orderBy('id','DESC')->get();
        $data['blogpost']=blog::with('user','company')->where('status',1)->orderBy('id','DESC')->paginate(15);
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
        $data['cateJob'] = JobPostModel::with('category','company')->where('category_id',$cateId)->paginate(15);
        $data['companycate'] = JobPostModel::with('category','company')->where('company_id',$cateId)->paginate(15);
        return $this->returnData(2000,$data);

    }

    public function detailsData($id)
    {
        $seeker = Auth::guard('seeker')->user();
        $data['job'] = JobPostModel::findOrFail($id)->load('category', 'company');
        if ($seeker) {
            $data['application'] = Applications::with('seeker')
                ->where('seeker_id', $seeker->id)
                ->where('job_id', $id)
                ->get();
        } else {
            $data['application'] = [];
        }
        return $this->returnData(2000,$data);
    }

    public function blogDetails($id)
    {
        $post = Blog::with('company')->findOrFail($id);
        $post->increment('view_count');
        $data['post'] = $post;

        $data['blogComment'] = BlogComment::with('seeker')->where('blog_id',$id)->get();

        return $this->returnData(2000,$data);
    }
    public function applydetails($id){
        $post = Applications::with('job', 'seeker')->findOrFail($id);
        return $this->returnData(2000,$post);
    }

    public function frontData(){
        $data=Frontendmanage::get();
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


    public function fetchMessage(){
        if (Auth::guard('seeker')->check()) {
            $currentUserId = Auth::guard('seeker')->user()->id;
            $currentUserType = 'App\Models\Seeker';
        } else {
            $currentUserId = Auth::id();
            $currentUserType = 'App\Models\User';
        }

        $messages = Message::where(function ($query) use ($currentUserId, $currentUserType) {
            $query->where('receiver_id', $currentUserId)
                ->where('receiver_type', $currentUserType);
        })
            ->orWhere(function ($query) use ($currentUserId, $currentUserType) {
                $query->where('sender_id', $currentUserId)
                    ->where('sender_type', $currentUserType);
            })
            ->with(['sender', 'receiver'])
            ->get();

        return $this->returnData(2000,$messages);
    }

}
