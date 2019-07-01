<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
      'name'
    ];
    /**
     * Get Player Groups for Team
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
