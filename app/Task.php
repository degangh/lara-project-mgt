<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function project()
    {
        return $this->belongTo(Project::class);
    }
}
