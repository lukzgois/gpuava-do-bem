<?php

namespace App\Repositories\Users;

use App\Repositories\BaseRepository;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\CrudMethods;

class UserRepository extends BaseRepository
{
    use CrudMethods;
    /**
     * @var string Model for the repository
     */
    protected $modelClass = User::class;

    
}
