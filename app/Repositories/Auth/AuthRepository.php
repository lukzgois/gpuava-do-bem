<?php

namespace App\Repositories\Auth;

use App\Contracts\Repositories\Auth\Auth as AuthContract;
use App\Repositories\BaseRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository extends BaseRepository implements AuthContract
{
	/**
	 * @var string Model for the repository
	 */
	protected $modelClass = User::class;

	/**
	 * Get a user by its credentials.
	 *
	 * @param  string $email    E-mail of the user.
	 * @param  string $password User password.
	 * @return User|null        The user instance or null if not found.
	 */
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