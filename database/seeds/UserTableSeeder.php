<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create SuperAdmin role
        $SuperAdminRole = new Role();
        $SuperAdminRole->name = "super_admin";
        $SuperAdminRole->display_name = "Super Admin";
        $SuperAdminRole->description = "CRUD all";
        $SuperAdminRole->save();

        //create admin role
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->description = "CR users";
        $adminRole->save();

        //create moderator role
        $moderatorRole = new Role();
        $moderatorRole->name = "moderator";
        $moderatorRole->display_name = "Moderator";
        $moderatorRole->description = "RU companies,students etc";
        $moderatorRole->save();

//        $users = ['Pavel_K', 'Igor_B', 'Alex_S', 'Andry_S', 'Evgeniya_S', 'User_U'];
//        foreach ($users as $value) {
//            DB::table('users')->insert([
//                'name' => $value,
//                'email' => $value . '@gmail.com',
//                'password' => bcrypt($value . '123'),
//            ]);
//        }

        //moder
        $Igor_B = new User();
        $Igor_B->name = "Igor_B";
        $Igor_B->email = "Igor_B@gmail.com";
        $Igor_B->password = bcrypt("Igor_B123");
        $Igor_B->save();

        $Igor_B->attachRole($moderatorRole);

        //moder
        $Alex_S = new User();
        $Alex_S->name = "Alex_s";
        $Alex_S->email = "Alex_s@gmail.com";
        $Alex_S->password = bcrypt("Alex_s123");
        $Alex_S->save();

        $Alex_S->attachRole($moderatorRole);

        //moder
        $Evgeniya_S= new User();
        $Evgeniya_S->name = "Evgeniya_S";
        $Evgeniya_S->email = "Evgeniya_S@gmail.com";
        $Evgeniya_S->password = bcrypt("Evgeniya_S123");
        $Evgeniya_S->save();

        $Evgeniya_S->attachRole($moderatorRole);


        //moder
        $Andry_S = new User();
        $Andry_S->name = "Andry_S";
        $Andry_S->email = "Andry_S@gmail.com";
        $Andry_S->password = bcrypt("Andry_S123");
        $Andry_S->save();

        $Andry_S->attachRole($moderatorRole);


        //moder
        $pasha = new User();
        $pasha->name = "pasha";
        $pasha->email = "karaspavel010@gmail.com";
        $pasha->password = bcrypt("111222rR");
        $pasha->save();

        $pasha->attachRole($moderatorRole);



        //superAdmin
        $superAdmin = new User();
        $superAdmin->name = "SuperAdmin";
        $superAdmin->email = "Superadmin@gmail.com";
        $superAdmin->password = bcrypt('superadmin');
        $superAdmin->save();

        $superAdmin->attachRole($SuperAdminRole);

        //admin
        $admin = new User();
        $admin->name = "Admin";
        $admin->email = "admin@gmail.com";
        $admin->password = bcrypt('admin');
        $admin->save();

        $admin->attachRole($adminRole);



    }
}
