<?php

use Illuminate\Database\Seeder;
use App\Team;
use App\Player;
class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = \App\Group::where('name', 'Arsenal FC')->first();
        $player = new Player();
        $player->name = 'Hector Bellerin';
        $player->group_id = $group->id;
        $player->save();
        $group = \App\Group::where('name', 'Bayern Munich')->first();
        $player = new Player();
        $player->name = ' James Rodriguez';
        $player->group_id = $group->id;
        $player->save();
        $group = \App\Group::where('name', 'Chelsea FC')->first();
        $player = new Player();
        $player->name = 'David Luiz';
        $player->group_id = $group->id;
        $player->save();

    }
}
