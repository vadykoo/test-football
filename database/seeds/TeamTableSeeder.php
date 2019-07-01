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
        $team->save();
        $team = new \App\Team();
        $team->name = 'Second Team';
        $team->save();
        $team = new \App\Team();
        $team->name = 'Women’s Team';
        $team->save();
        $team = new \App\Team();
        $team->name = 'Staff';
        $team->save();
    }
}
