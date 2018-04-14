<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['name'];
    public function user(){
        return $this->belongsTo(User::class, "owner_id");
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
    
}
