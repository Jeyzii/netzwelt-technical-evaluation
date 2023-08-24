<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('username', 'password');
    
        $response = Http::post('https://netzwelt-devtest.azurewebsites.net/Account/SignIn', $credentials);
    
        if ($response->successful()) {
            $data = json_decode($response->body());
    
            $user = User::where('username', $data->username)->first();
    
            if ($user) {
                Auth::login($user);
    
                return redirect('/');
            } else {
                return back()->with('error', 'Invalid username or password');
            }
        } else {
            return back()->with('error', 'Invalid username or password');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    
}