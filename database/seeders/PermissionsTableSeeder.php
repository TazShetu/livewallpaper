<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $ps = [
            0 => ["permission", "Permission", "Permission menu that goes under ACL"],
            1 => ["role", "Role", "Role menu that goes under ACL"],
            2 => ["user", "User", "User menu that goes under ACL"],
            3 => ["category", "Category", "Category menu"],
            4 => ["sub_category", "Sub Category", "Sub Category menu"],
            5 => ["image", "Image", "Image menu"],
        ];
        $superAdmin = Role::find(2);
        $admin = Role::find(3);
        $uploader = Role::find(8);
        foreach ($ps as $i => $p){
            $a = new Permission;
            $a->name = $p[0];
            $a->display_name = $p[1];
            $a->description = $p[2];
            $a->save();
            $superAdmin->attachPermission($a);
            $admin->attachPermission($a);
            if ($i > 2) {
                $uploader->attachPermission($a);
            }
        }
    }
}
