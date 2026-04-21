<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArchitecteNotification extends Notification
{
    use Queueable;

    private string $email;
    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your Architect Account Has Been Created')
            ->greeting('Hello ' . $notifiable->fullname . ',')
            ->line('Your architect account has been created successfully.')
            ->line('You can use the following credentials to log in:')
            ->line('Email: ' . $this->email)
            ->line('Password: ' . $this->password)
            ->action('Login to your account', url('/login'))
            ->line('Please change your password after your first login.');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}