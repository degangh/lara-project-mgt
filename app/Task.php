<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['name', 'project_id', 'user_id'];
    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function project()
    {
        return $this->belongTo(Project::class);
    }
}
