<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index() {
        return view('register');
    }

    public function saveUser(Request $request) {
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',
            'name' => 'required|max:255',
            'password' => 'required'
        ]);

        $user = new User;

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/');
    }
}
