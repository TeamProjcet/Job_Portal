<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\JobPostModel;
use App\Supports\Helper;
use Illuminate\Http\Request;
use function Nette\Utils\data;

class FrontendController extends Controller
{
    use Helper;
    public function jobview($jobId){

        $data = JobPostModel::where('id',$jobId)->get();

        return $this->returnData(2000,$data);
    }
}
