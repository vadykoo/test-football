<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(RoleTableSeeder::class);
//         $this->call(UserTableSeeder::class);
         $this->call(GroupTableSeeder::class);
         $this->call(TeamTableSeeder::class);
         $this->call(PlayerTableSeeder::class);
    }
}
