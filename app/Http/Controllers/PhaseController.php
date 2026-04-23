<?php

namespace App\Http\Controllers;

use App\Notifications\SocialNotifications;
use Illuminate\Http\Request;
use App\Models\ProjectPhase;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Notification;


class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $role = $user->role->name;

        if ($role == 'Admin') {
            $projects = ProjectPhase::where('status', '!=', 'archived')->get();
        } else {
            $projects = $user->projects()->where('status', '!=', 'archived')->get();
        }

        $direction = 'project.index';
        return view('layout.app', compact('direction', 'projects'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'project_id' => 'required|integer|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date|after:today',
        ]);

        if (!$validate) {
            return back()->with('error', 'Data Invalid');
        }
        ProjectPhase::create($validate);

        if (auth()->user()->role_id != 1) {
            $admin = User::where('role_id', '=', 1)->first();
            $admin->notify(new SocialNotifications('sprint', 'add new sprint', auth()->user()->fullname, $request->project_id));
        }
        $users = User::join('project_assignments', 'project_assignments.user_id', '=', 'users.id')
            ->where('project_assignments.project_id', $request->project_id)
            ->where('project_assignments.user_id', '!=', auth()->id())
            ->select('users.*')
            ->get();


        Notification::send($users, new SocialNotifications('sprint', 'add new sprint', auth()->user()->fullname, $request->project_id));





        return back()->with('success', 'Phase created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sprint = ProjectPhase::find($id);
        
        $project_id = $sprint->project_id;


        $pending_task = DB::table('tasks')
            ->leftjoin('users', 'users.id', '=', 'tasks.user_id')
            ->leftJoin('project_phases', 'project_phases.id', '=', 'tasks.sprint_id')
            ->where('tasks.sprint_id', '=', $id)
            ->where('tasks.status', '=', 'pending')
            ->select('tasks.*', 'users.avatar as avatar', 'users.fullname as fullname')
            ->get();

        $inProgress_task = DB::table('tasks')
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->leftJoin('project_phases', 'project_phases.id', '=', 'tasks.sprint_id')
            ->where('tasks.sprint_id', '=', $id)
            ->where('tasks.status', '=', 'in_progress')
            ->select('tasks.*', 'users.avatar as avatar', 'users.fullname as fullname')
            ->get();

        $completed_task = DB::table('tasks')
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->leftJoin('project_phases', 'project_phases.id', '=', 'tasks.sprint_id')
            ->where('tasks.sprint_id', '=', $id)
            ->where('tasks.status', '=', 'completed')
            ->select('tasks.*', 'users.avatar as avatar', 'users.fullname as fullname')
            ->get();


        $total_pending_task = Task::where('sprint_id', $id)
            ->where('status', '=', 'pending')
            ->count();

        $total_inProgress_task = Task::where('sprint_id', $id)
            ->where('status', '=', 'in_progress')
            ->count();

        $total_completed_task = Task::where('sprint_id', $id)
            ->where('status', '=', 'completed')
            ->count();

        $statusCount = [
            'pending' => $total_pending_task,
            'inProgress' => $total_inProgress_task,
            'completed' => $total_completed_task
        ];


        $direction = 'admin.projects.sprint.show';
        return view('layout.app', compact('direction', 'sprint', 'project_id', 'pending_task', 'inProgress_task', 'completed_task', 'statusCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectPhase $projectPhase)
    {
        $direction = 'project.phase.edit';
        return view('layout.app', compact('direction', 'projectPhase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'string',
            'percentage' => 'integer|min:0|max:100',
            'due_date' => 'required|date|after:today',
        ]);

        $projectPhase = ProjectPhase::find($id);

        $projectPhase->update($validate);

        if (auth()->user()->role_id != 1) {
            $admin = User::where('role_id', '=', 1)->first();
            $admin->notify(new SocialNotifications('sprint', 'Update sprint', auth()->user()->fullname, $projectPhase->project_id));
        }
        $users = User::join('project_assignments', 'project_assignments.user_id', '=', 'users.id')
            ->where('project_assignments.project_id', $projectPhase->project_id)
            ->where('project_assignments.user_id', '!=', auth()->id())
            ->select('users.*')
            ->get();

        Notification::send($users, new SocialNotifications('sprint', 'Update  sprint', auth()->user()->fullname, $projectPhase->project_id));



        return back()->with('success', 'Phase updated successfully');
    }



    public function destroy(string $id)
    {
        $sprint = ProjectPhase::find($id);
        if (!$sprint) {
            return back()->with('error', 'Sprint Not Found');

        }

        if (auth()->user()->role_id != 1) {
            $admin = User::where('role_id', '=', 1)->first();
            $admin->notify(
                new SocialNotifications(
                    'sprint',
                    'A sprint has been deleted.',
                    auth()->user()->fullname,
                    'null'
                )
            );
        }
        $users = User::join('project_assignments', 'project_assignments.user_id', '=', 'users.id')
            ->where('project_assignments.project_id', $sprint->project_id)
            ->where('project_assignments.user_id', '!=', auth()->id())
            ->select('users.*')
            ->get();


        Notification::send($users, new SocialNotifications(
            'sprint_deleted',
            'A sprint has been deleted.',
            auth()->user()->fullname,
            'null'
        ));



        $sprint->delete();


        return back()->with('success', 'Sprint Deleted Successfully');
    }


}
