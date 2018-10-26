<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['content', 'sender_id', 'reader_id','notifiable_type','notifiable_id'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function reader()
    {
        return $this->belongsTo(User::class, 'reader_id');
    }
}
