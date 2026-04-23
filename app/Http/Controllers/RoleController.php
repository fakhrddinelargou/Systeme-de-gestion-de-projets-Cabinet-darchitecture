<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Notifications\SocialNotifications;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function assignRole(Request $request, string $id)
    {
        $allowedRoles = ['client', 'architecte'];

        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User Not Found'], 404);
        }

        if ($user->id == 1) {
            return response()->json(['message' => 'Access Denied. You do not have permission to perform this action.'], 403);
        }

        if (!in_array($request->role, $allowedRoles)) {
            return response()->json(['message' => 'Invalid Role Name'], 422);
        }

        $role = Role::where('name', $request->role)->first();

        if (!$role) {
            return response()->json(['message' => 'Role not found in database'], 404);
        }

        // 6. Update
        $user->update([
            'role_id' => $role->id
        ]);

        $user->notify(
            new SocialNotifications(
                'role_updated',
                'Your role has been updated.',
                auth()->user()->fullname,
                'null'
            )
        );

        return response()->json([
            'message' => 'Role updated successfully',
            'user' => $user->load('role')
        ], 200);
    }
}
