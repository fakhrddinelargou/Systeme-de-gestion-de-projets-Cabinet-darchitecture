<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
// use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\returnArgument;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $direction = 'profile.index';
        return view('layout.app', compact('direction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'fullname' => 'required|string|min:5|max:100',
            'email' => 'required|email|max:250|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'email_verified_at' => null,
        ]);

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);

        // 3. Check wach l-password l-qdim s7i7
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password Not Correct!']);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password updated successfully!');
    }

    public function updateImage(Request $request)
    {

        $request->validate([
            'avatar' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
        ]);

        $path = auth()->user()->avatar;
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
        }

        $user = auth()->user();
        $user->update([
            'avatar' => $path
        ]);

        return back()->with('seccuss', 'Update Seccuss');

    }

}
