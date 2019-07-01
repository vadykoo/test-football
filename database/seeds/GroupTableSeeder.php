<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new \App\Group();
        $group->name = 'Real Madrid';
        $group->team_id = '1';
        $group->save();
        $group = new \App\Group();
        $group->name = 'FC Barcelona';
        $group->team_id = '1';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Manchester United';
        $group->team_id = '1';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Chelsea FC';
        $group->team_id = '1';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Bayern Munich';
        $group->team_id = '1';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Arsenal FC';
        $group->team_id = '1';
        $group->save();
    }
}
