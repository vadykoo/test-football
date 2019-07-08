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
        $group->name = 'Right Winger';
        $group->team_id = '1';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Centre-Back';
        $group->team_id = '1';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Defensive Midfield';
        $group->team_id = '1';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Left-Back';
        $group->team_id = '1';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Right Winger';
        $group->team_id = '1';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Attacking Midfield';
        $group->team_id = '1';
        $group->save();


        $group = new \App\Group();
        $group->name = 'Right Winger';
        $group->team_id = '2';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Centre-Back';
        $group->team_id = '2';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Defensive Midfield';
        $group->team_id = '2';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Left-Back';
        $group->team_id = '2';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Right Winger';
        $group->team_id = '2';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Attacking Midfield';
        $group->team_id = '2';
        $group->save();

        $group = new \App\Group();
        $group->name = 'Right Winger';
        $group->team_id = '3';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Centre-Back';
        $group->team_id = '3';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Defensive Midfield';
        $group->team_id = '3';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Left-Back';
        $group->team_id = '3';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Right Winger';
        $group->team_id = '3';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Attacking Midfield';
        $group->team_id = '3';
        $group->save();

        $group = new \App\Group();
        $group->name = 'Right Winger';
        $group->team_id = '4';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Centre-Back';
        $group->team_id = '4';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Defensive Midfield';
        $group->team_id = '4';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Left-Back';
        $group->team_id = '4';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Right Winger';
        $group->team_id = '4';
        $group->save();
        $group = new \App\Group();
        $group->name = 'Attacking Midfield';
        $group->team_id = '4';
        $group->save();
    }
}
