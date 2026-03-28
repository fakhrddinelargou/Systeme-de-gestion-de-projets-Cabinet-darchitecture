<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $direction =  'admin.users.index';
    $users = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('users.role_id' , '!=' , 1)
        ->select('users.*', 'roles.name as role_name')
        ->paginate(4);
    $total = User::where('role_id' , '!=' , 1)->count();

    return view('layout.app' , compact('direction' , 'users' , 'total' ));
    
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
        //
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
        if($user->role_id != 1){

            DB::table('sessions')->where('user_id', $user->id)->delete();
            $user->delete();
            return back()->with('success' , 'deleted successfully');

        }

        // dd('dads');
    }
}
