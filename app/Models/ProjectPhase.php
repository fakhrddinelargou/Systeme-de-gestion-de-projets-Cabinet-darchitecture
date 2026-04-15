<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class ProjectPhase extends Model
{

    protected $fillable = [

        'title',
        'project_id',
        'description',
        'percentage',
        'status',
        'due_date',
        'updated_at'

    ];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
