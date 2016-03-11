<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Users\UserCreate;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(UserRepository $repository)
    {
        return $repository->getAll();
    }

    public function store(UserCreate $request, UserRepository $repository)
    {
        $repository->create($request->all());

        return redirect('/admin/users');
    }
}
