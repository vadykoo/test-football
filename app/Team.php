<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
      'name', 'club_id'
    ];
    /**
     * Get Player Groups for Team
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
