<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['name'];
    public function user(){
        return $this->belongTo(User::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
    
}
