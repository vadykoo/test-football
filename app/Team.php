<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * Get Player Groups for Team
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
