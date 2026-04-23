<?php

namespace App\Http\Controllers\admin;

use App\Models\ProjectAssignment;
use App\Models\User;
use App\Models\ProjectPhase;
use App\Notifications\SocialNotifications;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.client_id')
            ->leftjoin('project_phases', 'projects.id', '=', 'project_phases.project_id')
            ->select(
                'users.avatar as avatar',
                'projects.id as id',
                'users.fullname as client_name',
                'projects.reference as reference',
                'projects.title as title',
                'projects.status as status',
                'projects.created_at',
                DB::raw('SUM(project_phases.percentage) as total_progress'),
                DB::raw('COUNT(project_phases.id) as total_sprint')
            )
            ->groupBy(
                'users.avatar',
                'users.fullname',
                'projects.id',
                'projects.reference',
                'projects.title',
                'projects.status',
                'projects.created_at'
            )
            ->orderBy('projects.created_at', 'desc')
            ->get();

        //    dd($projects);

        $direction = 'admin.projects.index';
        return view('layout.app', compact('projects', 'direction'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'client_id' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'reference' => 'required|string|unique:projects,reference',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Project::create($validate);

        return back()->with('success', 'creation successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect()->route('projects')->with('error', 'Project Not Found');
        }

        $workers = DB::table('users')
            ->leftJoin('project_assignments', 'project_assignments.user_id', '=', 'users.id')
            ->where('users.role_id', 2)
            ->whereNull('project_assignments.user_id')
            ->select('users.id', 'users.fullname')
            ->get();

        $project_workers = DB::table('users')
            ->join('project_assignments', 'project_assignments.user_id', '=', 'users.id')
            ->where('project_assignments.project_id', '=', $id)
            ->select('users.avatar', 'users.fullname as fullname', 'users.id as id', 'project_assignments.role as role')
            ->get();

        $total_workers = ProjectAssignment::where('project_id', $id)->count();
        $sprints = ProjectPhase::where('project_id', $id)
            ->get();
        $total_sprints = ProjectPhase::where('project_id', $id)->count();
        $total_sprint_completed = ProjectPhase::where('project_id', $id)->where('status', '=', 'completed')->count();

        $total_percentage = ProjectPhase::where('project_id', $id)
            ->sum('percentage');
        $percentage_global = $total_percentage > 0 ? ($total_percentage / $total_sprints) : 0;

        $direction = 'admin.projects.show';
        return view('layout.app', compact('direction', 'sprints', 'total_sprint_completed', 'percentage_global', 'total_sprints', 'project', 'workers', 'project_workers', 'total_workers'));
    }

    public function filterByStatus(string $status)
    {
        $status_dispo = ['all', 'in_progress', 'pending', 'complated', 'archived'];
        $projects = null;
        if (!in_array($status, $status_dispo)) {
            return response()->json([
                'error' => 'Status Not Found'
            ]);
        }

        if ($status == 'all') {
            $projects = DB::table('projects')
                ->join('users', 'users.id', '=', 'projects.client_id')
                ->select('users.avatar as avatar', 'projects.id as id', 'users.fullname as client_name', 'projects.reference as reference', 'projects.total_progress as total_progress', 'projects.title as title', 'projects.status as status')
                ->latest('projects.created_at')
                ->get();

            return response()->json([
                'projects' => $projects
            ]);
        }

        $projects = DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.client_id')
            ->where('projects.status', '=', $status)
            ->select('users.avatar as avatar', 'projects.id as id', 'users.fullname as client_name', 'projects.reference as reference', 'projects.total_progress as total_progress', 'projects.title as title', 'projects.status as status')
            ->latest('projects.created_at')
            ->get();


        return response()->json([
            'projects' => $projects
        ]);
    }

    public function search(string $title)
    {

        $projects = DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.client_id')
            ->where('projects.title', 'like', '%' . $title . '%')
            ->select('users.avatar as avatar', 'projects.id as id', 'users.fullname as client_name', 'projects.reference as reference', 'projects.total_progress as total_progress', 'projects.title as title', 'projects.status as status')
            ->latest('projects.created_at')
            ->get();

        return response()->json([
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(string $id)
    {
        $project = Project::find($id);

        return view('admin.projects.update', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function edite(Request $request, string $id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'reference' => [
                'required',
                'string',
                Rule::unique('projects', 'reference')->ignore($id),
            ],
            'status' => 'required',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $project = Project::find($id);



        if (!$project) {
            return back()->with('error', 'Project not found');
        }


        $project->update($validate);
        $users = User::join('project_assignments', 'project_assignments.user_id', '=', 'users.id')
            ->where('project_assignments.project_id', $project->id)
            ->where('project_assignments.user_id', '!=', auth()->id())
            ->select('users.*')
            ->get();

        Notification::send(
            $users,
            new SocialNotifications(
                'project',
                'The project has been updated.',
                auth()->user()->fullname,
                $id
            )
        );

        return back()->with('success', 'Update successfully');
    }

    /**
     * Archive project
     */
    public function archive(Project $project)
    {
        if ($project->status !== 'archived') {
            $project->update(['status' => 'archived']);
            return back()->with('success', 'Project archived successfully!');
        }
        return back()->with('info', 'this project already archived.');
    }

    /**
     * Unarchive project
     */
    public function unArchive(Project $project, string $status)
    {
        if ($project->status !== 'archived') {
            return back()->with('error', 'this project is not  archived!');
        }

        $allowedStatus = ['pending', 'in_progress', 'completed'];

        if (in_array($status, $allowedStatus)) {
            $project->update(['status' => $status]);
            return back()->with('success', 'Project restored successfully');
        }

        return back()->with('error', 'Status Error!');
    }

    public function acceptStatus(string $id)
    {

        $project = Project::where('id', $id)->first();

        $project->update([
            'status' => 'accepted'
        ]);

        $user = User::where('id', '=', $project->client_id)->first();
        $user->notify(
            new SocialNotifications(
                'project',
                'Your project has been accepted.',
                auth()->user()->fullname,
                $project->id
            )
        );
        return back()->with('success', 'Project accepted Successfully');

    }

    public function refuserStatus(string $id)
    {

        $project = Project::where('id', $id)->first();
        $project->update([
            'status' => 'rejected'
        ]);

        $user = User::where('id', '=', $project->client_id)->first();
        $user->notify(
            new SocialNotifications(
                'project',
                'Your project has been refused.',
                auth()->user()->fullname,
                $project->id
            )
        );

        return back()->with('success', 'Project rejected Successfully');

    }

}