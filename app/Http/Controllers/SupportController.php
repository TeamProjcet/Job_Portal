<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Supports\Helper;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    use Helper;

    public function requireData()
    {
        $array = request()->all();
        $data = [];
        if (in_array('category', $array)) {
            $data['category'] = Category::get();
        }
        if (in_array('company', $array)) {
            $data['company'] = Company::get();
        }

        if(in_array('job_type', $array)){
            $data['job_type'] = [
                [
                    'name' => 'Featured',
                    'value' => 1
                ],
                [
                    'name' => 'Full Time',
                    'value' => 2
                ],
                [
                    'name' => 'Part Time',
                    'value' => 3
                ],

            ];
        }


        return $this->returnData(2000, $data);

    }
}
