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
                'icon' => 'fas fa-briefcase',
                'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                'submenus' => [
                    [
                        'name' => 'Job Category',
                        'key' => 'categories',
                        'link' => '/admin/jobcategory/category',
                        'icon' => 'fas fa-folder',
                        'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                    ],
                    [
                        'name' => 'Company',
                        'key' => 'company',
                        'link' => '/admin/jobcategory/company',
                        'icon' => 'fas fa-building',
                        'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                    ],
                    [
                        'name' => 'Job Post',
                        'key' => 'joblist',
                        'link' => '/admin/jobcategory/joblist',
                        'icon' => 'fas fa-file-alt',
                        'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                    ],
                ],
            ],
            [
                'name' => 'Blog',
                'key' => 'blog',
                'link' => '#',
                'icon' => 'fas fa-newspaper',
                'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                'submenus' => [
                    [
                        'name' => 'Blog Post',
                        'key' => 'blogpost',
                        'link' => '/admin/blog/blogpost',
                        'icon' => 'fas fa-pen',
                        'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy']
                    ],
                    [
                        'name' => 'Blog Comment',
                        'key' => 'blogcomment',
                        'link' => '/admin/blog/blogcomment',
                        'icon' => 'fas fa-pen',
                        'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy']
                    ],
                ],
            ],
            [
                'name' => 'Applicant Information',
                'key' => 'apply',
                'link' => '#',
                'icon' => 'fas fa-file-alt',
                'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                'submenus' => [
                    [
                        'name' => 'Application',
                        'key' => 'application',
                        'link' => '/admin/seeker/application',
                        'icon' => 'fas fa-pen',
                        'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                    ],
                ],
            ],
            [
                'name' => 'Interview',
                'key' => 'interview',
                'link' => '#',
                'icon' => 'fas fa-file-alt',
                'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                'submenus' => [
                    [
                        'name' => 'Interview Schedules',
                        'key' => 'interview',
                        'link' => '/admin/interview',
                        'icon' => 'fas fa-pen',
                        'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                    ],
                ],
            ],
            [
                'name' => 'RolePermission',
                'key' => 'rolepermission',
                'link' => '#',
                'icon' => 'fas fa-file-alt',
                'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                'submenus' => [
                    [
                        'name' => 'Role User Management',
                        'key' => 'roleusermanagement',
                        'link' => '/admin/role/rolepermissions',
                        'icon' => 'fas fa-users',
                        'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                    ],
                    [
                        'name' => 'User',
                        'key' => 'users',
                        'link' => '/admin/user/registration',
                        'icon' => 'fas fa-users',
                        'permission' =>['index','store', 'show','create', 'edit', 'update', 'destroy'],
                    ],
                    [
                        'name' => 'Role',
                        'key' => 'roles',
                        'link' => '/admin/role/role',
                        'icon' => 'fas fa-user-shield',
                        'permission' => ['index', 'store','edit','getRolePermissions', 'updateRolePermissions', 'update', 'destroy'],
                    ],
                    [
                        'name' => 'Role Permission',
                        'key' => 'permissions',
                        'link' => '/admin/role/permissions',
                        'icon' => 'fas fa-lock',
                        'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                    ],
                ],
            ],
            [
                'name' => 'Visitor',
                'key' => 'visitor',
                'link' => '#',
                'icon' => 'fas fa-user',
                'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                'submenus' => [
                    [
                        'name' => 'NewsLetter',
                        'key' => 'newsletter',
                        'link' => '/admin/visitor/newsletter',
                        'icon' => 'fas fa-pen',
                        'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                    ],
                    [
                        'name' => 'Contact',
                        'key' => 'contact',
                        'link' => '/admin/visitor/contact',
                        'icon' => 'fas fa-pen',
                        'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                    ],
                ],
            ],
            [
                'name' => 'Partnerships',
                'key' => 'partnership',
                'link' => '#',
                'icon' => 'fas fa-handshake',
                'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                'submenus' => [
                    [
                        'name' => 'Collaboartions',
                        'key' => 'partnership',
                        'link' => '/admin/client/partnership',
                        'icon' => 'fas fa-users',
                        'permission' => ['index','store', 'show','create', 'edit', 'update', 'destroy'],
                    ],
                ],

        ],
        ];

        $adminRole = Role::create(['name' => 'Admin']);

        User::where('id', 1)->update(['role_id' => $adminRole->id]);

        foreach ($modules as $eachModule) {
            $this->RoleWithPermissions($eachModule, $adminRole);
        }
    }

    private function RoleWithPermissions(array $moduleData, Role $role, $parentId = 0)
    {
        $module = Module::create([
            'name' => $moduleData['name'],
            'link' => $moduleData['link'],
            'parent_id' => $parentId,
            'icon' => $moduleData['icon'],
        ]);

        RoleModule::create([
            'role_id' => $role->id,
            'module_id' => $module->id,
        ]);

        foreach ($moduleData['permission'] as $permission) {
            $permissionModel = Permission::create([
                'module_id' => $module->id,
                'name' => $moduleData['key'] . "." . $permission,
            ]);

            RolePermission::create([
                'role_id' => $role->id,
                'permission_id' => $permissionModel->id,
            ]);
        }

        if (isset($moduleData['submenus']) && is_array($moduleData['submenus'])) {
            foreach ($moduleData['submenus'] as $subModuleData) {
                $this->RoleWithPermissions($subModuleData, $role, $module->id);
            }
        }
    }
}
