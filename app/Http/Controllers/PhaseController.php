<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectPhase;


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
    public function store(Request $request )
    {
        $validate = $request->validate([
            'project_id' => 'required|integer|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'percentage' => 'required|integer|min:0|max:100',
            'due_date' => 'required|date',
        ]);

        if(!$validate){
        return back()->with('error', 'Data Invalid');
        }
        ProjectPhase::create($validate);
        return back()->with('success', 'Phase created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectPhase $projectPhase)
    {
        $direction = 'project.phase.show';
        return view('layout.app', compact('direction', 'projectPhase'));
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
            'percentage' => 'required|integer|min:0|max:100',
            'due_date' => 'required|date',
        ]);

        $projectPhase = ProjectPhase::findOrFail($id);

        $totalOthers = ProjectPhase::where('project_id', $projectPhase->project_id)
            ->where('id', '!=', $id)
            ->sum('percentage');

        if (($totalOthers + $request->percentage) > 100) {
            return back()->with('error', "L-majmo3 maghadi-ch i-koun s7i7! (Max allowed for this phase: " . (100 - $totalOthers) . "%)");
        }

        $projectPhase->update($validate);

        return back()->with('success', 'Phase updated successfully');
    }



}
