<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class SocialNotifications extends Notification
{
    use Queueable;

    private string $type;
    private string $data;
    private string $fullname;
    private string $direction;

    public function __construct(string $type , string $data , string $fullname , $direction)
    {
        $this->type = $type;
        $this->data = $data;
        $this->fullname = $fullname;
        $this->direction = $direction;
    }

    public function via(object $notifiable): array
    {
        return ['database']; 
    }

    public function toDatabase(object $notifiable): array
    {
        // dd($this);
        return [
            'type' => $this->type,
            'data' => [
                "message" => $this->data,
                "fullname" => $this->fullname,
                "direction" => $this->direction
            ],
        ];
    }
}