<?php


namespace App\Http\Controllers;


use App\Models\User;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{
    public function index() {
        return view('login');
    }

    public function signIn(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
//            'name' => 'required',
        ]);

//        $credentials['password'] = Hash::make($credentials['password']);

//        dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
