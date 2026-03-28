<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
    public function registerPage()
    {
        $direction = 'Auth.register';
        return view('layout.gusts', compact('direction'));
    }

    public function loginPage()
    {
    //     if (auth()->check()) {
    //     if (auth()->user()->role_id == 1) return redirect()->route('admin.dashboard');
    //     if (auth()->user()->role_id == 2) return redirect()->route('architecte.dashboard');
    //     return redirect()->route('client.dashboard');
    // }
        $direction = 'Auth.login';
        return view('layout.gusts', compact('direction'));
    }
    public function store(RegisterRequest $request)
    {

        $validatedData = $request->validated();

        $path = null;
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
        }
        // dd($request->file('avatar'), $request->avatar);
        // dd($validatedData);
        $user = User::create([
            'fullname' => $validatedData['fullname'],
            'role_id' => 3,
            'avatar' => $path,
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);



        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();

                return redirect()->route('dashboard');
            
        }

        return back()->with('error', 'Invalid data');
    }
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
                return redirect()->route('dashboard');
                    
        }



        return redirect()->route('login.page')->with('error', 'Invalid Data');

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
