<?php

use Illuminate\Database\Seeder;

class ClubAdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('club_admins')->insert([
                ['club_id' => 1, 'user_id' => 1],
                ['club_id' => 1, 'user_id' => 2],
                ['club_id' => 3, 'user_id' => 2],
                ['club_id' => 2, 'user_id' => 2],
                ['club_id' => 4, 'user_id' => 2],
        ]);
    }
}
