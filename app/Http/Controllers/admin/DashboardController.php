<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = auth()->user()->role->name;
        $direction = $role . '.dashboard';
        $architects = User::where('role_id', 2)->count();
        $clients = User::where('role_id', 3)->where('is_active', true)->count();
        $active_projects = Project::where('status', 'in_progress')->count();
        $pending_projects = Project::where('status', 'pending')->count();
        $new_projects = DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.client_id')
            ->where('projects.status', '=', 'pending')
            ->select(
                'projects.id as project_id',
                'users.fullname as user_name',
                'users.avatar as avatar',
                'projects.title as project_name',
                'projects.created_at as created_at',
            )
            ->latest('projects.created_at')
            ->get();


        $last_users_weekly = User::where('created_at', '>=', Carbon::now()->subDays(7))->count();
        $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select(
                'users.id',
                'users.fullname',
                'users.email',
                'users.avatar',
                'roles.name as role_name',
                'users.created_at as joined_date'
            )
            ->where('users.role_id', '!=', 1)
            ->where('users.is_active', true)
            ->latest('users.created_at')
            ->take(10)
            ->get();

        $data = null;
        if (auth()->user()->role_id == 1) {


            $data = [
                'architects' => $architects,
                'clients' => $clients,
                'active_projects' => $active_projects,
                'pending_projects' => $pending_projects,
                'last_users_weekly' => $last_users_weekly,
                'users' => $users,
                'new_projects' => $new_projects

            ];

        }

        return view('layout.app', compact('direction', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
