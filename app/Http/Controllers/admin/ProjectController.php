<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Project;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class ProjectController extends Controller
{

    public function index()
    {
        $projects = DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.client_id')
            ->select('users.avatar as avatar', 'projects.id as id' , 'users.fullname as client_name', 'projects.reference as reference', 'projects.total_progress as total_progress', 'projects.title as title', 'projects.status as status')
            ->latest('projects.created_at')
            ->get();
        $direction = 'admin.projects.index';
        return view('layout.app', compact('projects', 'direction'));

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
        if(!$project){
            return redirect()->route('projects')->with('error' , 'Project Not Found');
        }

            $direction = 'admin.projects.show';
        return view('layout.app', compact('direction' , 'project'));
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
                ->select('users.avatar as avatar','projects.id as id' , 'users.fullname as client_name', 'projects.reference as reference', 'projects.total_progress as total_progress', 'projects.title as title', 'projects.status as status')
                ->latest('projects.created_at')
                ->get();

            return response()->json([
                'projects' => $projects
            ]);
        }

        $projects = DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.client_id')
            ->where('projects.status', '=', $status)
            ->select('users.avatar as avatar','projects.id as id', 'users.fullname as client_name', 'projects.reference as reference', 'projects.total_progress as total_progress', 'projects.title as title', 'projects.status as status')
            ->latest('projects.created_at')
            ->get();


        return response()->json([
            'projects' => $projects
        ]);
    }

    public function search(string $title){
    
                $projects = DB::table('projects')
                ->join('users', 'users.id', '=', 'projects.client_id')
                ->where('projects.title' , 'like' , '%' . $title . '%')
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

    public function acceptStatus(string $id){

    Project::where('id' ,$id)
               ->update([
                'status' => 'accepted'
               ]);

    return back()->with('success' , 'Project accepted Successfully');

    }

        public function refuserStatus(string $id){

    Project::where('id' ,$id)
               ->update([
                'status' => 'rejected'
               ]);

    return back()->with('success' , 'Project rejected Successfully');

    }

}