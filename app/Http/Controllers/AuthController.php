<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\Auth\Auth as AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
	public function loginForm()
	{
		return view('login.index');
	}

	public function login(LoginRequest $request, AuthRepository $repository)
	{
		$user = $repository->getByCredentials($request->email, $request->password);
        if (!$user) {
            return redirect()->back()->withErrors([
                'email' => 'E-mail e/ou Senha incorretos.'
            ]);
        }

        Auth::login($user);

        return redirect('/');
	}

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
