<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view('userRegister');
    }

    public function login()
    {
        return view('userLogin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'password_confirmation' => 'required|same:password',
        ],
        [
            'name.required' => 'Preencha o campo Nome.',
            'email.required' => 'Preencha o campo Email.',
            'email.email' => 'Email invalido.',
            'password.required' => 'Preencha o campo senha.',
            'password.min' => 'A senha deve ter no minimo 5 caracteres.',
            'password_confirmation.required' => 'Preencha o campo de confirmação de senha.',
            'password_confirmation.same' => 'As senhas não conferem.',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('user.login')->with('success');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
                'email.required' => 'Preencha o campo Email.',
                'email.email' => 'Email invalido.',
                'password.required' => 'Preencha o campo senha.',
            ]
        );
        $credentials = $request->only('email', 'password');

        $authentication = Auth::attempt($credentials);

        if(!$authentication){
            return redirect()->route('user.login')->withErrors(['error' => 'Email ou senha incorretos.']);
        }
        return redirect()->route('home');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
