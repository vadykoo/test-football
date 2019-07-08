<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Lab404\Impersonate\Models\Impersonate;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use Impersonate;
    use HasMediaTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function role()
    {
        $user_role = DB::table('role_user')->where('user_id', $this->id)->first();
        $role = Role::find($user_role->role_id);
        return $role;
    }
    /**
     * Check one role
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}
