<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = new \App\Team();
        $team->name = 'First Team';
        $team->club_id = 1;
        $team->save();
        $team = new \App\Team();
        $team->name = 'Second Team';
        $team->club_id = 1;
        $team->save();
        $team = new \App\Team();
        $team->name = 'Women’s Team';
        $team->club_id = 1;
        $team->save();
        $team = new \App\Team();
        $team->name = 'Staff';
        $team->club_id = 1;
        $team->save();

        $team = new \App\Team();
        $team->name = 'First Team';
        $team->club_id = 2;
        $team->save();
        $team = new \App\Team();
        $team->name = 'Second Team';
        $team->club_id = 2;
        $team->save();
        $team = new \App\Team();
        $team->name = 'Women’s Team';
        $team->club_id = 2;
        $team->save();
        $team = new \App\Team();
        $team->name = 'Staff';
        $team->club_id = 2;
        $team->save();

        $team = new \App\Team();
        $team->name = 'First Team';
        $team->club_id = 3;
        $team->save();
        $team = new \App\Team();
        $team->name = 'Second Team';
        $team->club_id = 3;
        $team->save();
        $team = new \App\Team();
        $team->name = 'Women’s Team';
        $team->club_id = 3;
        $team->save();
        $team = new \App\Team();
        $team->name = 'Staff';
        $team->club_id = 3;
        $team->save();

        $team = new \App\Team();
        $team->name = 'First Team';
        $team->club_id = 4;
        $team->save();
        $team = new \App\Team();
        $team->name = 'Second Team';
        $team->club_id = 4;
        $team->save();
        $team = new \App\Team();
        $team->name = 'Women’s Team';
        $team->club_id = 4;
        $team->save();
        $team = new \App\Team();
        $team->name = 'Staff';
        $team->club_id = 4;
        $team->save();
    }
}
