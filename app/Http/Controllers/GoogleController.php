<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/signin')->withErrors(['oauth' => 'Google login failed: ' . $e->getMessage()]);
        }
        
        // Find user by Google ID or email
        $user = User::where('google_id', $googleUser->id)
                    ->orWhere('email', $googleUser->email)
                    ->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'password' => bcrypt(Str::random(16)),
            ]);

        session(['id' => $user->id, 'google_user_id' => $googleUser->id]);

            // Redirect to a page where the user can set their password
            return redirect()->route('setPassword', ['user' => $user->id]);

        } elseif (!$user->google_id) {
            // Link existing user to Google if not linked yet
            $user->google_id = $googleUser->id;
            $user->save();
            return redirect('/');

        }

        // Log the user in
        Auth::login($user, true);
        session(['id' => $user->id, 'google_user_id' => $googleUser->id]);

        return redirect('/');
    }


        // Show password set form
    public function showPasswordForm($userId)
    {
        $user = User::findOrFail($userId);
        return view('admin.SetPassword', compact('user'));
    }

    // Update password after user sets it
    public function updatePassword(Request $request, $userId)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed', // Ensure password is valid and confirmed
        ]);

        $user = User::findOrFail($userId);
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user, true);
        // session(['id' => $user->id, 'google_user_id' => $googleUser->id]);
        session(['id' => $user->id,]);

        return redirect('/');
    }

}
