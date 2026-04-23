<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Carbon\Carbon;



class AuthController extends Controller
{
    public function registerPage()
    {
        $direction = 'Auth.register';
        return view('layout.gusts', compact('direction'));
    }

    public function loginPage()
    {
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
            $role = auth()->user()->role->name;

            return redirect()->route($role . '.dashboard');


        }

        return back()->with('error', 'Invalid data');
    }
    public function login(LoginRequest $request)
    {
        // dd($request);
        $data = $request->validated();
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $role = auth()->user()->role->name;
            return redirect()->route($role . '.dashboard');

        }



        return redirect()->route('login.page')->with('error', 'The email or password you entered is incorrect.');

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function forgetPassword()
    {
        $direction = 'Auth.forget-password';
        return view('layout.gusts', compact('direction'));
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:225|exists:users,email',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => Hash::make($token),
            'created_at' => now(),
        ]);

        Mail::to($request->email)->send(new ResetPasswordMail($token, $request->email));

        return back()->with('success', 'Mail sent successfully');
    }
    public function resetPassword(Request $request, string $token)
    {
        if (!$token || !$request->email) {
            return redirect()->route('login')->with('error', 'Invalid reset link');
        }

        $record = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$record) {
            return redirect()->route('login')->with('error', 'Invalid reset link');
        }

        $direction = 'Auth.change-password';

        return view('layout.gusts', compact('direction', 'token'))
            ->with('email', $request->email);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ],
        ]);

        $record = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        // dd($record);
        if (!$record) {
            return back()->with([
                'error' => 'Invalid or expired token'
            ]);
        }

        if (Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->delete();

            return back()->with([
                'error' => 'This reset link has expired'
            ]);
        }

        if (!Hash::check($request->token, $record->token)) {
            return back()->with([
                'error' => 'Invalid or expired token'
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with([
                'error' => 'User not found'
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        return redirect()->route('login')->with('success', 'Password updated successfully');
    }
}
