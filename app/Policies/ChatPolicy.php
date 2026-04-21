<?php

namespace App\Policies;

use App\Models\User;

class ChatPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    public function sendMessage(User $user, User $recipient)
    {
        if ($user->role_id == 1) { return true; }
        if ($user->role_id == 2) { return in_array($user->role_id , [1,2]); }
        if ($user->role_id == 3) { return $recipient->role_id ==  1; }
    }
}
