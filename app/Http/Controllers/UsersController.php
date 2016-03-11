<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UserCreate;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }
}
