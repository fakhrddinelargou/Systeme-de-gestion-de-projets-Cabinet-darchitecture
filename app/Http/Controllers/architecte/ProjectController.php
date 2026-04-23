<?php

namespace App\Http\Controllers\architecte;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = DB::table('projects')
                       ->join('project_assignments' , 'project_assignments.project_id' , '=', 'projects.id')
                       ->join('users' , 'users.id' ,'=', 'projects.client_id')
                       ->where('project_assignments.user_id' , '=' , auth()->id())
                       ->orderBy('projects.created_at' , 'desc')
                       ->select('users.avatar as avatar', 'projects.id as id', 'users.fullname as client_name', 'projects.reference as reference', 'projects.total_progress as total_progress', 'projects.title as title', 'projects.status as status')
                       ->get();

        $direction = 'architecte.projects.index';
        return  view('layout.app' , compact('direction' , 'projects'));
    }
}
