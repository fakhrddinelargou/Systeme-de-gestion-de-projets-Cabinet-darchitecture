<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\ProjectPhase;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Util\Percentage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

            $task = Task::findOrFail($request->task_id);

            $task->sprint->update([
                'percentage' => $percentage
            ]);
        }

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

        $task->delete();
    }
}
