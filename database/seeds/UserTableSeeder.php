<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::where('name', 'super_admin')->first();
        $club_admin  = Role::where('name', 'club_admin')->first();
        $employee = new User();
        $employee->name = 'Super Admin';
        $employee->email = 'super@admin.com';
        $employee->password = bcrypt('secret');
        $employee->save();
        $employee->roles()->attach($super_admin);
        $manager = new User();
        $manager->name = 'Club Admin';
        $manager->email = 'club@admin.com';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->roles()->attach($club_admin);
    }
}
