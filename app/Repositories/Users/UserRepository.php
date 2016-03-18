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
    public function getAll($term = null, $take = 15, $paginate = true)
    {
        $query = $this->newQuery();
        if (null !== $term) {
            $query->whereRaw('LOWER(name) like ?', ['%' . strtolower($term) . '%'])
                    ->orWhereRaw('LOWER(email) like ?', ['%' . strtolower($term) . '%']);
        }

        $query->orderBy('updated_at', 'desc');

        return $this->doQuery($query, $take, $paginate);
    }

    
}
