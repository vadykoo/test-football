<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'team_id'
    ];

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
