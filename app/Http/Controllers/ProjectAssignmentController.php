<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Notifications\SocialNotifications;
use Illuminate\Http\Request;
use App\Models\ProjectAssignment;


class ProjectAssignmentController extends Controller
{
    public function storeWorker(Request $request, $projectId)
    {


        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'role' => ['required', 'string', 'min:2', 'max:50'],
        ]);

        $exists = ProjectAssignment::where('project_id', $projectId)
            ->where('user_id', $request->user_id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'User already assigned to this project.');
        }

        ProjectAssignment::create([
            'project_id' => $projectId,
            'user_id' => $request->user_id,
            'role' => $request->role,
        ]);

        $project = Project::where('id', '=', $projectId)->first();

        $user = User::find($request->user_id);
        $user->notify(
            new SocialNotifications(
                'assignment',
                'You have been added to "' . $project->title . '"',
                auth()->user()->fullname,
                $project->id
            )
        );

        return back()->with('success', 'Worker added successfully.');
    }

    public function deleteAssignments(string $id)
    {
        ProjectAssignment::where('user_id', $id)->delete();
        $user = User::where('id', $id)->first();
        $user->notify(
            new SocialNotifications(
                'assignment',
                auth()->user()->fullname . ' removed you from the project.',
                auth()->user()->fullname,
                'null'
            )
        );
        return back()->with('success', 'Worker deleted successfully.');
    }
}
