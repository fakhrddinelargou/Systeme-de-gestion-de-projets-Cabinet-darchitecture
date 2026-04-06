<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\Project;
use App\Models\Message;
use App\Models\Notification;


class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'fullname',
        'role_id',
        'avatar',
        'email',
        'password',
        'email_verified_at',
        'remember_token',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }




    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    public function projects()
    {
        return $this->hasMany(Project::class , 'client_id');
    }


    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
