<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function projects(){
        return $this->hasMany(Project::class, "owner_id");
    }

    public function onProjects(){
        return $this->belongsToMany(Project::class, "project_user", "user_id", "project_id");
    }
}
