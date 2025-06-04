<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    protected $user;

    public function show()
    {
        // Get logged-in user ID from session
        $userId = session('id');

        // Fetch user record from database
        $user = DB::table('users')->where('id', $userId)->first();

        if (!$user) {
            return redirect('/signin')->with('error', 'User not found');
        }

        // Get order statistics
        $stats = [
            'order_count' => DB::table('orders')
                ->where('user_id', $userId)
                ->count(),
            'total_spent' => DB::table('orders')
                ->where('user_id', $userId)
                ->sum('total_amount'),
        ];

        return view('Pages.Profile', [
            'user' => $user,
            'stats' => $stats,
            'member_since' => date('F j, Y', strtotime($user->created_at)),
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        // Get logged-in user ID from session
        $userId = session('id');

        // Fetch user record from database
        $user = DB::table('users')->where('id', $userId)->first();

        if (!$user) {
            return redirect('/signin')->with('error', 'User not found');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 
                       'unique:users,email,'.$userId],
        ]);

        DB::table('users')
            ->where('id', $userId)
            ->update($validated);

        return redirect()->route('profile.show')
            ->with('success', 'Profile updated successfully!');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        // Get logged-in user ID from session
        $userId = session('id');

        // Fetch user record from database
        $user = DB::table('users')->where('id', $userId)->first();

        if (!$user) {
            return redirect('/signin')->with('error', 'User not found');
        }

        $request->validate([
            'current_password' => ['required', 'string', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'password' => ['required', 'string', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()],
        ]);

        DB::table('users')
            ->where('id', $userId)
            ->update([
                'password' => Hash::make($request->password),
            ]);

        return redirect()->route('profile.show')
            ->with('success', 'Password updated successfully!');
    }
}