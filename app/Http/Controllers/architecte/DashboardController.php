<?php

namespace App\Http\Controllers\architecte;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectAssignment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $projects = DB::table('projects')
            ->join('project_phases', 'project_phases.project_id', '=', 'projects.id')
            ->join('project_assignments', 'project_assignments.project_id', '=', 'projects.id')
            ->join('users', 'users.id', '=', 'projects.client_id')
            ->where('project_assignments.user_id', auth()->id())
            ->select(
                'projects.id',
                'projects.title',
                'projects.status',
                'users.fullname as client_fullname',
                'projects.created_at',
                'projects.reference'
            )
            ->selectRaw('COALESCE(AVG(project_phases.percentage),0) as percentage')
            ->groupBy(
                'projects.id',
                'projects.title',
                'projects.status',
                'users.fullname',
                'projects.created_at',
                'projects.reference',
                'project_assignments.created_at'
                )
                ->orderByDesc('project_assignments.created_at')
                ->limit(5)
            ->get();

        $assigned_projects = DB::table('project_assignments')
            ->where('user_id', auth()->id())
            ->count();

        $active_projects = DB::table('projects')
            ->join('project_assignments', 'project_assignments.project_id', '=', 'projects.id')
            ->where('project_assignments.user_id', auth()->id())
            ->where('projects.status', '=', 'in_progress')
            ->count();
        $completed_projects = DB::table('projects')
            ->join('project_assignments', 'project_assignments.project_id', '=', 'projects.id')
            ->where('project_assignments.user_id', auth()->id())
            ->where('projects.status', '=', 'completed')
            ->count();

        $average_progress = DB::table('projects')
            ->join('project_assignments', 'project_assignments.project_id', '=', 'projects.id')
            ->where('project_assignments.user_id', auth()->id())
            ->sum('projects.total_progress');



        $user = User::where('id', auth()->id())
            ->first();
        $notifications = $user->unreadNotifications;
        $data = [
            'assigned_projects' => $assigned_projects,
            'active_projects' => $active_projects,
            'completed_projects' => $completed_projects,
            'average_progress' => $average_progress,

            'assigned_projects_list' => $projects,
            'notifications' => $notifications,
        ];

        // dd($data);
        $direction = 'architecte.dashboard';
        return view('layout.app', compact('direction', 'data'));
    }
}
