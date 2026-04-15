<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectPhase;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'sprint_id',
        'status',
        'user_id'
    ];

    public function sprint(){
     return $this->belongsTo(ProjectPhase::class);
    }

}
