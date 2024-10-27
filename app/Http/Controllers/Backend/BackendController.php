<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\blog;
use App\Models\BlogComment;
use App\Models\Contact;
use App\Models\Employers;
use App\Models\JobPostModel;
use App\Models\JobSeekers;
use App\Models\Newsletter;
use App\Models\PartnershipModel;
use App\Models\Seeker;
use App\Models\User;
use App\Supports\Helper;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->model = new Employers();
    }

    public function Counting(){

        $data['visitor'] = Contact::get();
        $data['subscriber'] = Newsletter::get();
        $data['seeker'] = Seeker::get();
        $data['employer'] = User::get();
        $data['job_post'] = JobPostModel::get();
        $data['applied'] = Applications::get();
        $data['partnership'] = PartnershipModel::get();
        $data['blog_post'] = blog::get();

        return $this->returnData(2000,$data);
    }

}
