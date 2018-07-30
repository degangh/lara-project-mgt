<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['name', 'desc'];
    public function user(){
        return $this->belongsTo(User::class, "owner_id");
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function members(){
        return $this->belongsToMany(User::class, "project_user", "project_id" , "user_id")->withTimestamps();
    }

    public function files(){
        return $this->hasMany(File::class);
    }
    
}
