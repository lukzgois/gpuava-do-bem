<?php

namespace App\Repositories\Auth;

use App\Contracts\Repositories\Auth\Auth as AuthContract;
use App\Repositories\BaseRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class Auth extends BaseRepository implements AuthContract
{
	protected $modelClass = User::class;

	public function getByCredentials($email, $password)
	{
		$user = $this->newQuery()->where([
			'email' => $email
		])->first();

		if (!$user) {
			return null;
		}
        
		if (!Hash::check($password, $user->password)) {
			return null;
		}

		return $user;
	}
}