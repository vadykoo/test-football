<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Club extends Model
{
    protected $fillable = [
        'name'
    ];
    /**
     * Get the admins for the club
     */
    public function admins()
    {
        $club_admins = DB::table('club_admins')->where('club_id', $this->id)->get();
        if($club_admins->first()){
            $admins = User::whereIn('id', $club_admins->pluck('user_id')->toArray())->get();
            return $admins;
        }
    }
}
