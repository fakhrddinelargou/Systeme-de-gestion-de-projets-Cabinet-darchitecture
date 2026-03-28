<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
        protected $fillable = [

    'type',
    'project_type',
    'user_id',
    'updated_at'

    ];
}
