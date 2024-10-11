<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Supports\Helper;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    use Helper;
//    public function backendData()
//    {
//        $application_status = \request()->input('application_status');
//
//        $data['applyData'] = Applications::where(function ($query) use ($application_status) {
//            if ($application_status) {
//                $query->where('application_status', $application_status);
//            }
//        })->with('category','company')->paginate(10);
//
////        $data['category'] = Category::get();
////
////        $data['company'] = Company::get();
//
//
//        return $this->returnData(2000,$data);
//    }
    public function backendData()
    {
        $application_status = \request()->input('application_status');

        $user = auth()->user(); // লগইন করা ব্যবহারকারী

        $data['applyData'] = Applications::with(['job.category', 'job.company', 'seeker'])
            ->whereHas('job', function ($query) use ($user) {
                $query->where('user_id', $user->id); // যেখানে জবটি ঐ ব্যবহারকারী পোস্ট করেছে
            })
            ->where(function ($query) use ($application_status) {
                if ($application_status) {
                    $query->where('application_status', $application_status); // আবেদন স্ট্যাটাস ফিল্টার
                }
            })->paginate(10);
        // $data['category'] = Category::get();
        // $data['company'] = Company::get();

        return $this->returnData(2000, $data);
    }

}
