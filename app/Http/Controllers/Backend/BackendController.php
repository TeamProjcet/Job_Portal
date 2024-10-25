<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\BlogComment;
use App\Models\Contact;
use App\Models\Employers;
use App\Models\Newsletter;
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

        return $this->returnData(2000,$data);
    }

}
