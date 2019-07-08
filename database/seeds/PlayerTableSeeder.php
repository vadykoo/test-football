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
        $player = new Player();
        $player->name = 'Hector Bellerin';
        $player->group_id = 1;
        $player->save();
        $player = new Player();
        $player->name = ' James Rodriguez';
        $player->group_id = 2;
        $player->save();
        $player = new Player();
        $player->name = 'David Luiz';
        $player->group_id = 3;
        $player->save();

    }
}
