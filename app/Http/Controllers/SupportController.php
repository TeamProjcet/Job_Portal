<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Category;
use App\Models\Company;
use App\Models\JobPostModel;
use App\Models\Module;
use App\Models\Role;
use App\Models\User;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if (in_array('roles', $array)) {
            $data['roles'] = Role::get();
        }
        if (in_array('user', $array)) {
            $data['user'] = User::get();
        }
        if (in_array('jobData', $array)) {
            $user = auth()->user();
            $data['jobData'] = JobPostModel::where('user_id', $user->id)->get();
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
        if (in_array('application_status',$array)) {
            $data['application_status'] = [
                [
                    'name' => 'Pending',
                    'value' => 0
                ],
                [
                    'name' => 'Accepted',
                    'value' => 1
                ],
                [
                    'name' => 'Recjeted',
                    'value' => 2
                ],
            ];
        }
            if (in_array('interview_status',$array)){
            $data['interview_status']=[
                [
                    'name'=>'Scheduled',
                    'value'=>0
                ],
                [
                    'name'=>'Selected',
                    'value'=>1
                ],
                [
                    'name'=>'Completed',
                    'value'=>2
                ],

                [
                    'name'=>'Rejected',
                    'value'=>3
                ],
            ];
        }



        return $this->returnData(2000, $data);

    }
    public function getconfigurations(){
        $permittedModuleId = DB::table('role_modules')->where('role_id', auth()->user()->role_id)->get()->pluck('module_id')->toArray();
        $data['menus'] = Module::where('parent_id', 0)
            ->whereIN('id', $permittedModuleId)
            ->with(['sub_menus' => function ($query) use ($permittedModuleId) {
                $query->whereIN('id', $permittedModuleId);
                $query->with(['sub_menus' => function ($query) {
                    $query->with('sub_menus');
                }]);
            }])->get();

        $data['permissions'] = $this->authPermissions();

        return $this->returnData(2000, $data);

    }
}
