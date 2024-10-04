<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleModule;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{

    public function run()
    {

        Role::truncate();
        Module::truncate();
        RolePermission::truncate();
        RoleModule::truncate();
        Permission::truncate();

        $modules = [
            [
                'name' => 'Job',
                'key' => 'job',
                'link' => '#',
                'icon' => 'fa-briefcase',  // এখানে আইকনের মান যোগ করা হয়েছে
                'permission' => ['add', 'view', 'edit', 'delete'],
                'submeuns' => [
                    ['name' => 'Job Category',
                        'key' => 'category',
                        'link' => '/admin/jobcategory/category',
                        'icon' => 'fa-folder', // সাবমেনুতে আইকন
                        'permission' => ['add', 'view', 'edit', 'delete'],
                        'submeuns' => []
                    ],
                    ['name' => 'Company',
                        'key' => 'company',
                        'link' => '/admin/jobcategory/company',
                        'icon' => 'fa-building', // সাবমেনুতে আইকন
                        'permission' => ['add', 'view', 'edit', 'delete'],
                    ],
                    ['name' => 'Job Post',
                        'key' => 'joblist',
                        'link' => '/admin/jobcategory/joblist',
                        'icon' => 'fa-file-alt', // সাবমেনুতে আইকন
                        'permission' => ['add', 'view', 'edit', 'delete'],
                    ]
                ],
            ],
            [
                'name' => 'Blog',
                'key' => 'blog',
                'link' => '#',
                'icon' => 'fa-blog', // এখানে আইকনের মান
                'permission' => ['add', 'view', 'edit', 'delete'],
                'submeuns' => [
                    ['name' => 'Blog Post',
                        'key' => 'blogpost',
                        'link' => '/admin/blog/blogpost',
                        'icon' => 'fa-pen', // সাবমেনুতে আইকন
                        'permission' => ['add', 'view', 'edit', 'delete'],
                    ],
                ],
            ],
        ];



//        $module = Module::create([
//            'name' => $moduleData['name'],
//            'link' => $moduleData['link'],
//            'parent_id' => $parentId,
//            'icon' => $moduleData['icon'] ?? null,  // `icon` ফিল্ড এখানে যুক্ত
//        ]);

//        $role = new Role();
//        $role->name = 'Admin';
//        $role->save();
//
//        User::where('id', 1)->update([
//            'role_id' => 1
//        ]);
//
//        foreach ($modules as $eachModule) {
//            $module = new Module();
//            $module->name = $eachModule['name'];
//            $module->link = $eachModule['link'];
//            $module->save();
//
//            $roleModule = new RoleModule();
//            $roleModule->role_id = $role->id;
//            $roleModule->module_id = $module->id;
//            $roleModule->save();
//
//            foreach ($eachModule['permission'] as $permission) {
//                $permissionModel = new Permission();
//                $permissionModel->module_id = $module->id;
//                $permissionModel->name = $eachModule['key'] . "_" . $permission;
//                $permissionModel->save();
//
//                $rolePermission = new RolePermission();
//                $rolePermission->role_id = $role->id;
//                $rolePermission->permission_id = $permissionModel->id;
//                $rolePermission->save();
//
//            }
//            foreach ($eachModule['submeuns'] as $submeun) {
//                $subModule = new Module();
//                $subModule->parent_id = $module->id;
//                $subModule->name = $submeun['name'];
//                $subModule->link = $submeun['link'];
//                $subModule->save();
//
//                $roleModule = new RoleModule();
//                $roleModule->role_id = $role->id;
//                $roleModule->module_id = $subModule->id;
//                $roleModule->save();
//
//                foreach ($submeun['permission'] as $permission) {
//                    $subPermissionModel = new Permission();
//                    $subPermissionModel->module_id = $module->id;
//                    $subPermissionModel->name = $submeun['key'] . "_" . $permission;
//                    $subPermissionModel->save();
//
//                    $rolePermission = new RolePermission();
//                    $rolePermission->role_id = $role->id;
//                    $rolePermission->permission_id = $subPermissionModel->id;
//                    $rolePermission->save();
//
//                }
//            }
//        }




        $adminRole = Role::create(['name' => 'Admin']);
//        $superadminRole = Role::create(['name' => 'Superadmin']);


        User::where('id', 1)->update(['role_id' => $adminRole->id]);


        foreach ($modules as $eachModule) {
            $this->RoleWithPermissions($eachModule, $adminRole);

        }
    }


    private function RoleWithPermissions(array $moduleData, Role $role,  $parentId=0)
    {

        $module = Module::create([
            'name' => $moduleData['name'],
            'link' => $moduleData['link'],
            'parent_id' => $parentId,
            'icon' => $moduleData['icon']
        ]);


        RoleModule::create([
            'role_id' => $role->id,
            'module_id' => $module->id,
        ]);

        foreach ($moduleData['permission'] as $permission) {
            $permissionModel = Permission::create([
                'module_id' => $module->id,
                'name' => $moduleData['key'] . "_" . $permission,
            ]);

            RolePermission::create([
                'role_id' => $role->id,
                'permission_id' => $permissionModel->id,
            ]);
        }

        if (isset($moduleData['submeuns']) && is_array($moduleData['submeuns'])) {
            foreach ($moduleData['submeuns'] as $subModuleData) {
                $this->RoleWithPermissions($subModuleData, $role, $module->id);
            }
        }

    }
}
