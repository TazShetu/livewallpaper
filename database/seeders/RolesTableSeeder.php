<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $rs = [
            0 => ["name", "display_name", "description"],
            1 => ["super_admin", "Super Admin", "Super Admin"],
            2 => ["admin", "Admin", "Admin"],
            3 => ["s_dev", "Senior Developer", "Senior Developer"],
            4 => ["dev", "Developer", "Developer"],
            5 => ["j_dev", "Junior Developer", "Junior Developer"],
            6 => ["i_dev", "Intern Developer", "Intern Developer"],
            7 => ["upload", "Uploader", "Uploader"],
        ];

        foreach ($rs as $r) {
            $a = new Role;
            $a->name = $r[0];
            $a->display_name = $r[1];
            $a->description = $r[2];
            $a->save();
        }
        $sau = User::find(2);
        $au = User::find(3);
        $sar = Role::find(2);
        $ar = Role::find(3);
        $sau->attachRole($sar);
        $au->attachRole($ar);
        $u1 = User::find(6);
        $u2 = User::find(7);
        $ru = Role::find(8);
        $u1->attachRole($ru);
        $u2->attachRole($ru);
    }
}
