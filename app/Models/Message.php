<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{

    protected $fillable = [

        'type',
        'sender_id',
        'receiver_id',
        'project_id',
        'content',
        'is_read',
        'updated_at'

    ];


    public function sender()
    {
        return $this->belongsTo(User::class);
    }


    public function receiver()
    {
        return $this->belongsTo(User::class);
    }


}
