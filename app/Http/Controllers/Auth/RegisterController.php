<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
Use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // or 'admin' for admin registration
        ]);

        Auth::login($user);
        return redirect()->route('admin.questionnaires.index');
    }
}
