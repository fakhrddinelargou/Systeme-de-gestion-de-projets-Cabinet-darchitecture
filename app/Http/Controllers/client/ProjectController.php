<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('client_id', auth()->id())
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
            'total_progress' => 'required|min:0|max:100',
        ]);

        Project::create([...$validate, 'client_id' => Auth::id()]);

        return back()->with('success', 'creation successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        $phases = DB::table('project_phases')
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
        return view('layout.app', compact('direction', 'project', 'stats', 'phases'));
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
