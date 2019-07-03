<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'super_admin';
        $role_employee->description = 'Super admin';
        $role_employee->save();
        $role_manager = new Role();
        $role_manager->name = 'club_admin';
        $role_manager->description = 'Managers of Football Clubs';
        $role_manager->save();
        $role_manager = new Role();
        $role_manager->name = 'user';
        $role_manager->description = 'User';
        $role_manager->save();
    }
}
