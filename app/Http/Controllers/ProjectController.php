<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $role = $user->role->name;

        if ($role == 'admin') {
            $projects = Project::where('status', '!=', 'archived')->get();
        } else {
            $projects = $user->projects()->where('status', '!=', 'archived')->get();
        }

        $direction = $role . '.projects.index';
        // dd($direction);
        return view('layout.app', compact('direction', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $direction = 'project.create';

        return view(
            'layout.app',
            compact('direction')
        );
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
    public function show(Project $project)
    {
        $direction = 'project.show';
        return view('layout.app', compact('direction', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $direction = 'project.edit';
        return view('layout.app', compact('direction', 'project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $project = Project::find($id);

        if (!$project) {
            return back()->with('error', 'Project not found');
        }

        $project->update($validate);

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

}
