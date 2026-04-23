<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Notifications\SocialNotifications;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TaskController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sprint_id' => ['required', 'exists:project_phases,id'],
            'title' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'due_date' => ['nullable', 'date', 'after_or_equal:today'],
        ]);

        $task = Task::create([
            ...$validated,
            'user_id' => auth()->id(),
            'status' => 'pending',
        ]);

        $sprint = $task->sprint;


        if (auth()->user()->role_id != 1) {
            $admin = User::where('role_id', 1)->first();

            if ($admin) {
                $admin->notify(
                    new SocialNotifications('task', 'created task', auth()->user()->fullname, $sprint->id)
                );
            }
        }

        $users = User::join('project_assignments', 'project_assignments.user_id', '=', 'users.id')
            ->join('project_phases', 'project_phases.project_id', '=', 'project_assignments.project_id')
            ->where('project_phases.id', $sprint->id)
            ->where('project_assignments.user_id', '!=', auth()->id())
            ->where('users.role_id', '!=', 1)
            ->select('users.*')
            ->distinct()
            ->get();
        Notification::send(
            $users,
            new SocialNotifications('task', 'created task', auth()->user()->fullname, $sprint->id)
        );


        $total_tasks = DB::table('tasks')
            ->where('tasks.sprint_id', '=', $task->sprint_id)
            ->count();

        $total_tasks_completed = DB::table('tasks')
            ->where('tasks.sprint_id', '=', $task->sprint_id)
            ->where('tasks.status', '=', 'completed')
            ->count();

        $percentage = $total_tasks > 0 ? (int) ($total_tasks_completed * (100 / $total_tasks)) : 0;


        $task->sprint->update([
            'percentage' => $percentage
        ]);


        return back()->with('success', 'Task created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->sprint_id);
        $validated = $request->validate([
            'sprint_id' => ['required', 'exists:project_phases,id'],
            'task_id' => ['required', 'exists:tasks,id'],
            'title' => ['required', 'string', 'min:3'],
            'description' => ['nullable', 'string'],
            'due_date' => ['nullable', 'date', 'after_or_equal:today'],
            'status' => 'required'
        ]);

        $task = Task::find($request->task_id);
        $task->update($validated);

        if ($request->status == 'completed') {
            $total_tasks = DB::table('tasks')
                ->where('sprint_id', $request->sprint_id)
                ->count();

            $total_tasks_completed = DB::table('tasks')
                ->where('sprint_id', $request->sprint_id)
                ->where('status', 'completed')
                ->count();

            $percentage = $total_tasks > 0
                ? (int) ($total_tasks_completed * (100 / $total_tasks))
                : 0;


            $task = Task::find($request->task_id);

            $clientId = $task->sprint->project->client->id;
    
            $user = User::where('id', $clientId)->first();
            if ($percentage == 100) {
                $user->notify(new SocialNotifications('client', 'sprint has been completed', 'System', 'null'));
            }

            $task->sprint->update([
                'percentage' => $percentage
            ]);
        }


        if (auth()->user()->role_id != 1) {
            $admin = User::where('role_id', 1)->first();

            if ($admin) {
                $admin->notify(
                    new SocialNotifications('task', 'Updated task', auth()->user()->fullname, 'null')
                );
            }
        }


        $users = User::join('project_assignments', 'project_assignments.user_id', '=', 'users.id')
            ->join('project_phases', 'project_phases.project_id', '=', 'project_assignments.project_id')
            ->where('project_phases.id', $request->sprint_id)
            ->where('project_assignments.user_id', '!=', auth()->id())
            ->where('users.role_id', '!=', 1)
            ->select('users.*')
            ->distinct()
            ->get();

        Notification::send(
            $users,
            new SocialNotifications('task', 'updated task', auth()->user()->fullname, 'null')
        );

        return back()->with('success', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);

        $total_tasks = DB::table('tasks')
            ->where('tasks.sprint_id', '=', $task->sprint_id)
            ->count();

        $total_tasks_completed = DB::table('tasks')
            ->where('tasks.sprint_id', '=', $task->sprint_id)
            ->where('tasks.status', '=', 'completed')
            ->count();


        $percentage = $total_tasks > 0 ? (int) ($total_tasks_completed * (100 / $total_tasks)) : 0;


        $task->sprint->update([
            'percentage' => $percentage
        ]);

        if (auth()->user()->role_id != 1) {
            $admin = User::where('role_id', 1)->first();

            if ($admin) {
                $admin->notify(
                    new SocialNotifications('task', 'Deleted task', auth()->user()->fullname, 'null')
                );
            }
        }


        $users = User::join('project_assignments', 'project_assignments.user_id', '=', 'users.id')
            ->join('project_phases', 'project_phases.project_id', '=', 'project_assignments.project_id')
            ->where('project_phases.sprint_id', $task->sprint_id)
            ->where('project_assignments.user_id', '!=', auth()->id())
            ->where('users.role_id', '!=', 1)
            ->select('users.*')
            ->distinct()
            ->get();

        Notification::send(
            $users,
            new SocialNotifications('task', 'Deleted task', auth()->user()->fullname, 'null')
        );

        $task->delete();
    }
}
