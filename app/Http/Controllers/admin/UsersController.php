<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
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
    public function index()
    {
        $direction = 'admin.users.index';
        $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('users.role_id', '!=', 1)
            ->select('users.*', 'roles.name as role_name')
            ->paginate(4)
            ->withQueryString();
        $total = User::where('role_id', '!=', 1)->count();

        return view('layout.app', compact('direction', 'users', 'total'));

    }

        public function pagination()
    {
        $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('users.role_id', '!=', 1)
            ->select('users.*', 'roles.name as role_name')
            ->paginate(1)
            ->withQueryString();

                return response()->json([
            'users' => $users
        ]);


    }

    /**
     * Store a newly created resource in storage.
     */
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

    public function search(string $name)
    {

        $users = null;
        if (!empty($name)) {

            $users = DB::table('users')
                ->join('roles', 'users.role_id', '=', 'roles.id')
                ->where('users.role_id', '!=', 1)
                ->where('users.fullname', 'like', '%' . $name . '%')
                ->select('users.*', 'roles.name as role_name')
                ->get();

        }
        return response()->json([
            'users' => $users->values()
        ]);
    }


    public function searchByrole(string $role)
    {


        $users = null;
        if (!empty($role)) {

            $users = DB::table('users')
                ->join('roles', 'users.role_id', '=', 'roles.id')
                ->where('users.role_id', '!=', 1)
                ->where('roles.name', '=', $role )
                ->select('users.*', 'roles.name as role_name')
                ->get();

        }
        return response()->json([
            'users' => $users->values()
        ]);

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
