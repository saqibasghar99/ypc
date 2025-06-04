<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function Signup(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',]
        ]);

        if($validator->fails()){
            return redirect()->route('signup')->withErrors($validator)->withInput();
        }

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'customer';
        $user->save();

        return redirect('/signin')->with('status', 'Registeration successfull!');
    }

    public function Signin(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();
        
        if($user)
        {
            if (Hash::check($request->input('password'), $user->password)){
                session()->put('id', $user->id);
                session()->put('google_user_id', $user->google_id);
                
                if($user->role == 'admin'){
                    return redirect()->route('admin.dashboard')->with('success', 'Login Successfully!');
                }
                elseif($user->role == 'customer'){
                        return redirect('/')->with('success', 'Login Successfully!');
                }
            }
            else{
                return redirect()->back()->withErrors('error', 'Wrong password!');
            }
        }
        else
        {
            return redirect()->back()->withErrors(['error' => 'Credentials not match!']);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        session()->forget(['id', 'google_user_id']);
        return redirect()->route('signin')->with('success','Logout successfully!');
    }

    public function getallUsers(){
        $all_users = User::all();
        return view('admin.allUsers', compact('all_users'));
    }

    
    public function delete_user(Request $request, $id)
    {
        $user = User::where('id', $id)->where('role', '!=', 'admin')->first();
        
        if (!$user) {
            return redirect()->back()->with('error', 'User not found!');
        }

        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }









    // ---------------------------------------------------

    public function AdminSignup(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',]
        ]);

        if($validator->fails()){
            return redirect()->route('admin-to-admin')->withErrors($validator)->withInput();
        }

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'admin';
        $user->save();

        return redirect('/signin')->with('status', 'Registeration successfull!');
    }

}