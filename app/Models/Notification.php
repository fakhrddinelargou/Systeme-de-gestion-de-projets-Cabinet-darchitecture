<?php

namespace App\Models;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Notification extends DatabaseNotification
{
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [

        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
        'read_at',
        'updated_at'

    ];

    protected $casts = [
        'data' => 'array',
        'read_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
