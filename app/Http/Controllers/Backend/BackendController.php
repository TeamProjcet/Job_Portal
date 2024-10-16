<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Supports\Helper;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    use Helper;

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

}
