<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Users\UserCreate;
use App\Http\Requests\Users\UserEdit;
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
        return $repository->create($request->all());
    }

    public function update($id, UserEdit $request, UserRepository $repository)
    {
        $user = $repository->findByID((int)$id, true);
        $repository->update($user, $request->all());

        return $user;
    }
}
