<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $direction = 'admin.users.index';

    $query = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('users.role_id', '!=', 1)
        ->select('users.*', 'roles.name as role_name');

    if ($request->filled('role') && $request->role !== 'all') {
        $query->where('roles.name', $request->role);
    }

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('users.fullname', 'like', "%{$search}%")
              ->orWhere('users.email', 'like', "%{$search}%");
        });
    }

    $users = $query->paginate(5)->withQueryString();

    $total = DB::table('users')
        ->where('role_id', '!=', 1)
        ->count();

    if ($request->ajax()) {
        return response()->json($users);
    }

    return view('layout.app', compact('direction', 'users', 'total'));
}


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|min:5|max:100',
            'avatar' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'email' => 'required|email|max:250|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);

        User::create([
            'fullname' => $validatedData['fullname'],
            'role_id' => 2,
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return back()->with('success', 'User Added successfully');
    }




    public function block(string $id)
    {
        $user = User::where('id', $id)
            ->where('role_id', '!=', 1)
            ->first();
            
        if (!$user) {
            return response()->json([
                'message' => 'User not found or unauthorized.'
            ], 404);
        }

        $user->is_active = !$user->is_active;
        $user->save();

        $statusText = $user->is_active ? 'Activated' : 'Blocked';

        return response()->json([
            'message' => "User account has been {$statusText} successfully.",
            'data' => $user,
            'old' => $user->is_active
                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateRole(Request $request, string $id)
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

        return response()->json([
            'message' => 'Role updated successfully',
            'user' => $user->load('role')
        ], 200);
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

        $user = User::findOrFail($id);
        if ($user->role_id != 1) {

            DB::table('sessions')->where('user_id', $user->id)->delete();
            $user->delete();
            return back()->with('success', 'deleted successfully');

        }
    }
}
