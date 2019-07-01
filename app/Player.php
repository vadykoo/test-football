<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     *  Get the Player Group
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
