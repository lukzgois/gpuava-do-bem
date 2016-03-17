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

     /**
     * Returns all records.
     * If $take is false then brings all records
     * If $paginate is true returns Paginator instance.
     *
     * @param int  $take
     * @param bool $paginate
     *
     * @return EloquentCollection|Paginator
     */
    public function getAll($take = 15, $paginate = true)
    {
        $query = $this->newQuery();
        $query->orderBy('created_at', 'desc');

        return $this->doQuery($query, $take, $paginate);
    }

    
}
