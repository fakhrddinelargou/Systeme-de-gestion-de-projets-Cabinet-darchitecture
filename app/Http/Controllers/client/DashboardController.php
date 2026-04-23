<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $direction = 'client.dashboard';

        $total_projects = Project::where('client_id', auth()->id())
            ->count();

        $pending_projects = Project::where('client_id', auth()->id())
            ->where('status', 'pending')
            ->count();

        $last_projects_weekly = Project::where('client_id', auth()->id())
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->count();

        $active_projects = Project::where('client_id', auth()->id())
            ->where('status', 'in_progress')
            ->count();

        $completed_projects = Project::where('client_id', auth()->id())
            ->where('status', 'completed')
            ->count();

        $projects = Project::where('client_id', auth()->id())
            ->latest('created_at')
            ->get();

        $notifications = auth()->user()->unreadNotifications;


        $data = [
            'total_projects' => $total_projects,
            'pending_projects' => $pending_projects,
            'last_projects_weekly' => $last_projects_weekly,
            'active_projects' => $active_projects,
            'completed_projects' => $completed_projects,
            'projects' => $projects,
            'notifications' => $notifications
        ];
        // dd($data);

        return view('layout.app', compact('direction', 'data'));
    }

}
