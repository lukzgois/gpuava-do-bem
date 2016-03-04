<?php

namespace App\Contracts\Repositories\Auth;

interface Auth
{
	public function getByCredentials($email, $password);
}