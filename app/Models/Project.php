<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ProjectPhase;

class Project extends Model
{

    protected $fillable = [

        'title',
        'client_id',
        'description',
        'location',
        'reference',
        'type',
        'status',
        'start_date',
        'end_date',
        'total_progress',
        'updated_at'

    ];



    public function client()
    {
        return $this->belongsTo(User::class);
    }


    public function worker()
    {
        return $this->belongsTo(User::class);
    }


    public function phases()
    {
        return $this->hasMany(ProjectPhase::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
