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
        return $this->returnData(2000, $data);

    }
}
