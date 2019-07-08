<?php

use Illuminate\Database\Seeder;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $club = new \App\Club();
        $club->name = 'Real Madrid';
        $club->save();
        $club = new \App\Club();
        $club->name = 'FC Barcelona';
        $club->save();
        $club = new \App\Club();
        $club->name = 'Manchester United';
        $club->save();
        $club = new \App\Club();
        $club->name = 'Chelsea FC';
        $club->save();
        $club = new \App\Club();
        $club->name = 'Bayern Munich';
        $club->save();
        $club = new \App\Club();
        $club->name = 'Arsenal FC';
        $club->save();
    }
}
