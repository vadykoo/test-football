<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * Get the Players for the group
     */
    public function players()
    {
        return $this->hasMany(Player::class);
    }
    /**
     * Get the Team for the group
     */
    public function group()
    {
        return $this->belongsTo(Team::class);
    }
}
