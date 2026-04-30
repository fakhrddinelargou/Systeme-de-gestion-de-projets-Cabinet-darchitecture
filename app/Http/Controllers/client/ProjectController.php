<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Events\DisplayNotification;
use Illuminate\Support\Facades\DB;
use App\Notifications\SocialNotifications;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('client_id', auth()->id())
            ->where('status', '!=', 'archived')
            ->get();
        $direction = 'client.projects.index';
        return view('layout.app', compact('direction', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $direction = 'client.projects.create';

        return view(
            'client.projects.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'reference' => 'required|string|unique:projects,reference',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $project = Project::create([...$validate, 'client_id' => Auth::id()]);

        $admin = User::where('role_id', '=', 1)->first();


        $admin->notify(new SocialNotifications('project created', 'A new project request has been submitted.', auth()->user()->fullname, $project->id));
        $notification = $admin->notifications()->orderBy('created_at', 'desc')->first();

        broadcast(new DisplayNotification($notification))->toOthers();

        return back()->with('success', 'creation successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        $phase = DB::table('project_phases')
            ->where('project_id', $id)
            ->latest('created_at')
            ->first();

        $stats = DB::table('project_phases')
            ->where('project_id', $id)
            ->select(
                DB::raw('SUM(percentage) as total_percentage'),
                DB::raw('COUNT(id) as total_sprint')
            )
            ->first();


        $direction = 'client.projects.show';
        return view('layout.app', compact('direction', 'project', 'stats', 'phase'));
    }

    public function search(string $title)
    {

        $projects = DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.client_id')
            ->join('project_phases', 'project_phases.project_id', '=', 'projects.id')
            ->where('users.id' , auth()->id())
            ->where('projects.title', 'like', '%' . $title . '%')
            ->where('projects.status', '!=', 'archived')
            ->select(
                'projects.id as id',
                'projects.reference as reference',
                'projects.title as title',
                'projects.status as status',
                'projects.type as type',
                'projects.end_date as deadline'
            )
            ->selectRaw('COALESCE(avg(project_phases.percentage), 0) as total_percentage')
            ->groupBy(
                'projects.id',
                'projects.reference',
                'projects.title',
                'projects.status',
                'projects.type',
                'projects.end_date'
            )
            ->latest('projects.created_at')
            ->get();
        return response()->json([
            'projects' => $projects
        ]);
    }

}
