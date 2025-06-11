<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register', ['title' => 'Register']);
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        //return redirect()->route('listing.index');

        return redirect()->route('vehicles.index');
    }

    public function showLogin() {
        return view('auth.login', ['title' => 'Login']);
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
/*         
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('listing.index'));
        } 
*/

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('vehicles.index'));
        } 

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}
