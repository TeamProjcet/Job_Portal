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
