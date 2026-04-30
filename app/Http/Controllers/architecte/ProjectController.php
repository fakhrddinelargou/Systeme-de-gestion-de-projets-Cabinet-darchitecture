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
            ->join('project_phases', 'project_phases.project_id', '=', 'projects.id')
            ->join('project_assignments', 'project_assignments.project_id', '=', 'projects.id')
            ->join('users', 'users.id', '=', 'projects.client_id')
            ->where('project_assignments.user_id', auth()->id())
            ->select(
                'users.avatar as avatar',
                'projects.id as id',
                'users.fullname as client_name',
                'projects.reference as reference',
                'projects.title as title',
                'projects.status as status'
            )
            ->selectRaw('COALESCE(avg(project_phases.percentage), 0) as total_percentage')
            ->groupBy(
                'users.fullname',
                'users.avatar',
                'projects.id',
                'projects.reference',
                'projects.title',
                'projects.status'
            )
            ->orderBy('projects.created_at', 'desc')
            ->get();

        $direction = 'architecte.projects.index';
        return view('layout.app', compact('direction', 'projects'));
    }

public function search(string $title)
{
    $projects = DB::table('projects')
        ->join('project_phases', 'project_phases.project_id', '=', 'projects.id')
        ->join('project_assignments', 'project_assignments.project_id', '=', 'projects.id')
        ->join('users', 'users.id', '=', 'projects.client_id')
        ->where('project_assignments.user_id', auth()->id())
        ->where('projects.title', 'like', '%' . $title . '%') 
        ->select(
            'users.avatar as avatar',
            'projects.id as id',
            'users.fullname as client_name',
            'projects.reference as reference',
            'projects.title as title',
            'projects.status as status'
        )
        ->selectRaw('COALESCE(avg(project_phases.percentage), 0) as total_percentage')
        ->groupBy(
            'users.fullname',
            'users.avatar',
            'projects.id',
            'projects.reference',
            'projects.title',
            'projects.status'
        )
        ->orderBy('projects.created_at', 'desc')
        ->get();

    return response()->json([
        'projects' => $projects
    ]);
}


 public function filterByStatus(string $status)
{
    $status_dispo = ['all', 'in_progress', 'pending', 'completed', 'archived'];

    if (!in_array($status, $status_dispo)) {
        return response()->json([
            'error' => 'Status Not Found'
        ]);
    }

    $query = DB::table('projects')
        ->join('project_phases', 'project_phases.project_id', '=', 'projects.id')
        ->join('project_assignments', 'project_assignments.project_id', '=', 'projects.id') // ✅ FIX
        ->join('users', 'users.id', '=', 'projects.client_id')
        ->where('project_assignments.user_id', auth()->id()) // ✅ FIX
        ->select(
            'users.avatar as avatar',
            'projects.id as id',
            'users.fullname as client_name',
            'projects.reference as reference',
            'projects.title as title',
            'projects.status as status'
        )
        ->selectRaw('COALESCE(avg(project_phases.percentage), 0) as total_percentage')
        ->groupBy(
            'users.fullname',
            'users.avatar',
            'projects.id',
            'projects.reference',
            'projects.title',
            'projects.status'
        )
        ->orderBy('projects.created_at', 'desc');

    if ($status !== 'all') {
        $query->where('projects.status', $status);
    }

    $projects = $query->get();

    return response()->json([
        'projects' => $projects
    ]);
}



}
